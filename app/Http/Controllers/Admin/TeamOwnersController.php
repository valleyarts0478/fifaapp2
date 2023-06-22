<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team_owner;
use App\Models\Convention;
use App\Models\League;
use Illuminate\Support\Facades\Storage;
use InterventionImage;
use App\Services\ImageService;
use App\Services\TeamService;
use Illuminate\Support\Facades\DB; //QueryBuilder クエリビルダー
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Throwable;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\TeamLogoUploadRequest;
use App\Models\Player;
use App\Models\Past;

class TeamOwnersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $convention = Convention::orderBy('id', 'desc')->first();
        $team_owners = Team_owner::where('convention_id', $convention->id)
            ->orderBy('league_id', 'asc')
            ->paginate(24);

        return view('admin.team_owners.index', compact('team_owners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $team_owners = Team_owner::all();

        $conventions = Convention::select('id', 'convention_no')->get();
        $leagues = League::select('id', 'league_name')->get();



        return view('admin.team_owners.create', compact('team_owners', 'conventions', 'leagues'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'string|max:255',
            'email' => 'required|string|email|max:255|unique:team_owners',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'convention_id' => 'required|string|max:255',
            'league_id' => 'required|string|max:255',
            'team_name' => 'required|string|max:255',
            'team_abb' => 'required|string|max:255',
            'team_logo_url' => 'nullable|file',

        ]);

        // $team_owner = Team_owner::findOrFail();
        // $team_owner->convention_id = $request->convention_id;
        // $team_owner->league_id = $request->league_id;
        // $team_owner->team_name = $request->team_name;
        // $team_owner->team_abb = $request->team_abb;
        // if (!is_null($imageFile) && $imageFile->isValid()) {
        //     $team_owner->team_logo_url = $fileNameToStore;
        // }
        // $team_owner->password = Hash::make($request->password);
        // $team_owner->save();

        $imageFile = $request->team_logo_url; //一時保存
        if (!is_null($imageFile) && $imageFile->isValid()) {
            $fileNameToStore = TeamService::logoupload($imageFile, 'teams');
        }
        // dd($fileNameToStore);//OK
        Team_owner::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'convention_id' => $request->convention_id,
            'league_id' => $request->league_id,
            'team_name' => $request->team_name,
            'team_abb' => $request->team_abb,
            // 'team_logo_url' => $request->file('team_logo_url')->store('/public/teams'),
            'team_logo_url' => $fileNameToStore,

        ]);


        return redirect()->route('admin.team_owners.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $team_owner = Team_owner::findOrFail($id);

        // $team_owner = Team_owner::select('id', 'convention_id', 'league_id', 'team_name', 'team_abb', 'team_logo_url', 'created_at')
        //     ->get();

        $conventions = Convention::select('id', 'convention_no')->get();
        // dd($convention);
        $leagues = League::select('id', 'league_name')->get();



        return view('admin.team_owners.edit', compact('team_owner', 'conventions', 'leagues'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TeamLogoUploadRequest $request, $id)
    {
        $request->validate([
            'convention_id' => 'required|string|max:255',
            'league_id' => 'required|string|max:255',
            'team_name' => 'required|string|max:255',
            'team_abb' => 'required|string|max:255',
            // 'team_logo_url' => 'nullable|file',
        ]);

        $imageFile = $request->image; //一時保存
        if (!is_null($imageFile) && $imageFile->isValid()) {
            $fileNameToStore = ImageService::upload($imageFile, 'teams');
        }

        $team_owner = Team_owner::findOrFail($id);
        $team_owner->convention_id = $request->convention_id;
        $team_owner->league_id = $request->league_id;
        $team_owner->team_name = $request->team_name;
        $team_owner->team_abb = $request->team_abb;
        if (!is_null($imageFile) && $imageFile->isValid()) {
            $team_owner->team_logo_url = $fileNameToStore;
        }

        $team_owner->save();

        return redirect()
            ->route('admin.team_owners.index')
            ->with([
                'message' => 'チーム情報を更新しました。',
                'status' => 'info'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Team_owner::findOrFail($id)->delete();

        return redirect()
            ->route('admin.team_owners.index')
            ->with([
                'message' => 'チームオーナー情報を削除しました。',
                'status' => 'alert'
            ]);
    }

    public function expiredTeamOwnerIndex()
    {
        $expiredTeamOwners = Team_owner::onlyTrashed()->get();

        return view('admin.expired-team_owners', compact('expiredTeamOwners'));
    }

    public function expiredTeamOwnerDestroy($id)
    {
        Team_owner::onlyTrashed()->findOrFail($id)->forceDelete();

        return redirect()->route('admin.expired-team_owners.index');
    }
}
