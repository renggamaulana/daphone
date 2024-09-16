<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function profile() {
        return view('pages.account.profile');
    }

    public function updateProfile(Request $request)
    {
        /** @var \App\Models\User $user **/
        $user = Auth::user();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$user->id],
            'phone_number' => ['required', 'string'],
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->save();

        return redirect()->route('profile')->with('success', 'Profil berhasil diperbarui.');
    }

    public function security() {
        return view('pages.account.security');
    }

    public function changePassword(Request $request)
    {
        # Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        #Match The Old Password
        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error", "Kata sandi lama tidak sesuai!");
        }

        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("success", "Kata sandi berhasil diubah!");
    }

    public function orders() {
        return view('pages.account.orders');
    }

    public function address() {
        $authUser = Auth()->user();
        $user = User::with('addresses')->findOrFail($authUser->id);
        return view('pages.account.address', [
            'user' => $user
        ]);
    }

    public function addAddress(Request $request)
    {
        $userId = Auth::user()->id;
        $user = User::findOrFail($userId);
        $user->addresses()->create([
            'recipient_name' => $request->recipient_name,
            'type' => $request->type,
            'phone_number' => $request->phone_number,
            'address_line1' => $request->address_line1,
            'state' => $request->state,
            'city' => $request->city,
            'postal_code' => $request->postal_code,
            'district' => $request->district,
        ]);

        return redirect()->back()->with('success', 'Alamat berhasil ditambahkan.');
    }

    public function deleteAddress($id)
    {
        $address = Address::where('user_id', Auth::user()->id)->findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Alamat berhasil dihapus.');
    }
}
