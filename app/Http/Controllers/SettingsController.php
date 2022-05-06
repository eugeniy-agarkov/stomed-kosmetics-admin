<?php
namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Settings $settings)
    {

        return view('settings', [
            'model' => $settings->getAll(),
        ]);

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $settings = $request->input('settings');

        foreach ($settings as $name => $value)
        {

            $model = Settings::find($name);

            if (!$model)
            {
                $model = new Settings([
                    'name' => $name,
                ]);
            }

            $model->value = $value;

            if (!$model->save())
            {
                throw new \LogicException('Failed to store setting value');
            }
        }

        return back()->with('message', 'Сохранено');

    }

}
