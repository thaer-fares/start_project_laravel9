<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

/**
 * Class DashboardController
 * @property UserRepositoryInterface $user_repo
 * @package App\Http\Controllers\Admin
 */
class DashboardController extends AdminController
{
    /**
     * @var UserRepositoryInterface
     */
    protected $user_repo;

    /**
     * DashboardController constructor.
     * @param UserRepositoryInterface $user_repo
     */
    public function __construct(UserRepositoryInterface $user_repo)
    {
        parent::__construct();
        $this->user_repo = $user_repo;
        self::$data['active_menu'] = 'dashboard';
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getIndex()
    {
        return view('admin.dashboard.view', self::$data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getProfile()
    {
        $id = Auth::guard('admin')->user()->id;
        parent::$data['info'] = $this->user_repo->get($id);
        return view('admin.dashboard.profile', self::$data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function postProfile(Request $request)
    {
        $id = Auth::guard('admin')->user()->id;

        $data = [
            'name' => $request->get('name'),
            'email' => $request->get('email'),
        ];

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3,max:100',
            'email' => 'required|unique:users,email,' . $id . ',id,deleted_at,NULL',
        ]);
        ////////////////////////
        if ($validator->fails()) {
            return $this->generalResponse('false', 400, trans('title.warning'), $validator->messages()->first(), null);
        }
        $update = $this->user_repo->update($id, $data);
        if (!$update) {
            return $this->generalResponse('false', 500, trans('title.error'), trans('messages.error'), null);
        }
        //////////////////////////////////////////////
        return $this->generalResponse('true', 200, trans('title.success'), trans('messages.updated'), $update);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getPassword()
    {
        $id = Auth::guard('admin')->user()->id;

        parent::$data['info'] = $this->user_repo->get($id);
        return view('admin.dashboard.password', self::$data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function postPassword(Request $request)
    {
        $id = Auth::guard('admin')->user()->id;

        $data = [
            'password' => Hash::make($request->get('password'))
        ];

        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'password' => 'required|between:6,16|confirmed',
            'password_confirmation' => 'required|between:6,16'
        ]);
        ////////////////////////
        if ($validator->fails()) {
            return $this->generalResponse('false', 400, trans('title.warning'), $validator->messages()->first(), null);
        }
        if (!Hash::check($request->old_password, Auth::guard('admin')->user()->password)) {
            return $this->generalResponse('false', 400, trans('title.error'), trans('messages.old_password'), null);
        }
        $update = $this->user_repo->update($id, $data);
        if (!$update) {
            return $this->generalResponse('false', 500, trans('title.error'), trans('messages.error'), null);
        }
        return $this->generalResponse('true', 200, trans('title.success'), trans('messages.changed'), $update);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function getLogout()
    {
        Auth::guard('admin')->logout();
        return redirect(route('admin.dashboard.view'));
    }
}
