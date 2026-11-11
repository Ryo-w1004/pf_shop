<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;


class ProfileController extends Controller
{
    public function edit()
    {
        return view('profEdit', ['user' => Auth::user()]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([

            'name' => 'nullable|string|max:255',
            'tel' => 'nullable|regex:/^0[0-9]{9,10}$/',
            'zip' => 'nullable|digits:7',
            'addr' => 'nullable|string|max:255',
            'age' => 'nullable|integer|min:0|max:130',
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore(Auth::id())],
            'introduction' => 'nullable|string|max:500',
            'pic' => 'nullable|image|mimes:jpeg,jpg,bmp,png|max:3072',
        ]);
        if ($request->hasFile('pic')) {
            // 画像を保存して、戻ってきたパスを $validated に入れる
            $validated['pic'] = $request->file('pic')->store('profile', 'public');
        } else {
            // 画像がないので、$validated から pic を取り除く
            unset($validated['pic']);
        }

        Auth::user()->updateProfile($validated);

        return redirect('/mypage')
            ->with([
                'status_success' => '編集は成功しました！'
            ]);

    }

}
