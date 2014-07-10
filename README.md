# Yet Another Form Validator

Place this is your app/start/global.php
````
App::error(function(Raymondidema\Validator\FormValidatorException $exception, $code)
{
    return Redirect::back()->withErrors($exception->getErrors())->withInput();
});
````