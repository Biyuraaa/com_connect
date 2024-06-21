<?php

namespace App\Http\Controllers;

use App\Models\Reward;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRewardRequest;
use App\Http\Requests\UpdateRewardRequest;
use App\Models\Transaction;
use App\Models\UserReward;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class RewardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            $rewards = Reward::all();
            return view('dashboard.rewards.index', compact('rewards'));
        } else {
            $user = Auth::user();
            $userRewards = $user->user_rewards()->with('reward')->get();

            return view('pages.auth.rewards.index', compact('userRewards'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.rewards.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRewardRequest $request)
    {
        $request->validated();

        Reward::create($request->all());

        return redirect()->route('rewards.index')->with('success', 'Reward created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reward $reward)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reward $reward)
    {
        return view('dashboard.rewards.edit', compact('reward'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRewardRequest $request, Reward $reward)
    {
        $request->validated();

        $reward->update($request->all());

        return redirect()->route('rewards.index')->with('success', 'Reward updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reward $reward)
    {
        $reward->delete();

        return redirect()->route('rewards.index')->with('success', 'Reward deleted successfully');
    }

    public function buy()
    {
        $user = Auth::user();
        $rewards = Reward::all();

        return view('pages.auth.rewards.buy', compact('rewards', 'user'));
    }

    public function buyReward(Request $request)
    {
        $request->validate([
            'reward_id' => 'required|exists:rewards,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $user = Auth::user();
        $reward = Reward::findOrFail($request->reward_id);

        if ($user->wallet->balance < $reward->price) {
            return redirect()->back()->with('error', 'Insufficient balance');
        }

        DB::beginTransaction();
        try {
            // Deduct the price from user's wallet balance
            $user->wallet->balance -= $reward->price;
            $user->wallet->save();

            // Create user reward record
            UserReward::create([
                'user_id' => $user->id,
                'reward_id' => $reward->id,
                'status' => 'pending',
                'expires_at' => now()->addDays(30)->toDateString(),
            ]);

            // Create a transaction record
            Transaction::create([
                'wallet_id' => $user->wallet->id,
                'reward_id' => $reward->id,
                'amount' => $reward->price,
                'type' => 'purchase',
            ]);

            DB::commit();

            return redirect()->route('rewards.index')->with('success', 'Reward purchased successfully');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', 'An error occurred while purchasing the reward. Please try again.');
        }
    }

    public function redeemReward($id)
    {
        $user = Auth::user();
        $userReward = UserReward::findOrFail($id);

        if ($userReward->status == 'redeemed') {
            return redirect()->back()->with('error', 'This reward has already been redeemed.');
        }

        DB::beginTransaction();
        try {
            // Update user's points
            $user->points += $userReward->reward->points;
            $user->save();

            // Update the user reward status to redeemed
            $userReward->status = 'redeemed';
            $userReward->redeemed_at = now();
            $userReward->save();

            Transaction::create([
                'wallet_id' => $user->wallet->id,
                'reward_id' => $userReward->reward->id,
                'amount' => 0,
                'type' => 'redeem',
            ]);
            DB::commit();

            return redirect()->route('rewards.index')->with('success', 'Reward redeemed successfully.');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', 'An error occurred while redeeming the reward. Please try again.');
        }
    }
}
