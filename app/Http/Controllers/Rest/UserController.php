<?php namespace App\Http\Controllers\Rest;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserFormRequest;
use App\Models\Project;
use App\Models\User;

class UserController extends Controller {

	public function indexForProject($projectId) {
		$project = Project::with('users')->find($projectId);

		if(!$project)
		{
			return response()->json(
				[
					'success' => false,
					'message' => 'The selected project doesn\'t exist.',
					'payload' => []
				]
			);
		}

		return response()->json(
			[
				'success' => true,
				'payload' => $project->toArray()['users']
			]);
	}

	public function show($userId) {
		$user = User::find($userId);

		if(!$user)
		{
			return response()->json(
				[
					'success' => false,
					'message' => 'The selected user doesn\'t exist.',
					'payload' => []
				]
			);
		}

		return response()->json(
			[
				'success' => true,
				'payload' => $user->toArray()
			]);
	}

	public function store(UserFormRequest $request) {
		$user = User::create($request->all());

		return response()->json(
			[
				'success' => true,
				'message' => 'User successfully added.',
				'payload' => $user->toArray()
			]);
	}

	public function update(UserFormRequest $request, $userId) {
		User::find($userId)->update($request->all());

		return response()->json(
			[
				'success' => true,
				'message' => 'Version successfully updated.',
				'payload' => User::find($userId)->toArray()
			]
		);
	}

	public function destroy($userId) {
		$user = User::find($userId);

		if(!$user)
		{
			return response()->json(
				[
					'success' => false,
					'message' => 'The selected user doesn\'t exist.',
					'payload' => []
				]
			);
		}

		User::destroy($userId);

		return response()->json(
			[
				'success' => true,
				'message' => 'The user has been successfully deleted.',
				'payload' => []
			]
			, 204);
	}
}

