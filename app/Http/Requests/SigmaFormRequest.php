<?php namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SigmaFormRequest extends FormRequest {
	/**
	 * Get the proper failed validation response for the request.
	 *
	 * @param  array  $errors
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function response(array $errors)
	{
		if ($this->ajax() || $this->wantsJson())
		{
			return response()->json(
				[
					'success' => false,
					'payload' => [],
					'error' => $errors
				]
			);
		}

		return $this->redirector->to($this->getRedirectUrl())
			->withInput($this->except($this->dontFlash))
			->withErrors($errors, $this->errorBag);
	}
}