<?php
namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Http\Handlers\Doctor\StoreDoctorPriceHandler;
use App\Http\Requests\Doctor\StoreDoctorPriceRequest;
use App\Models\Direction\Direction;
use App\Models\Doctor\Doctor;
use App\Models\Doctor\DoctorPrice;

class DoctorPriceController extends Controller
{

    /**
     * @param Doctor $doctor
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Doctor $doctor)
    {

        return view('doctor.price.index', [
            'doctor' => $doctor,
            'model' => $doctor->prices()->paginate(10) ?? new DoctorPrice(),
        ]);

    }

    /**
     * @param Doctor $doctor
     * @param DoctorPrice $price
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(Doctor $doctor, DoctorPrice $price)
    {

        return view('doctor.price.form', [
            'doctor' => $doctor,
            'model' => $price,
            'directions' => Direction::all()->pluck('name', 'id')->toArray()
        ]);

    }

    /**
     * @param StoreDoctorPriceRequest $request
     * @param StoreDoctorPriceHandler $handler
     * @param Doctor $doctor
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreDoctorPriceRequest $request, StoreDoctorPriceHandler $handler, Doctor $doctor)
    {

        if ($price = $handler->process($request, $doctor))
        {
            return redirect()->route('doctor.price.index', $doctor)->with('message', __( 'Сохранено' ));
        }

        return back()->withErrors($handler->getErrors());

    }

    /**
     * @param Doctor $doctor
     * @return void
     */
    public function show(DoctorPrice $price)
    {
        //
    }

    /**
     * @param Doctor $doctor
     * @param DoctorPrice $price
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Doctor $doctor, DoctorPrice $price)
    {

        return view('doctor.price.form', [
            'doctor' => $doctor,
            'model' => $price,
            'directions' => Direction::all()->pluck('name', 'id')->toArray()
        ]);

    }

    /**
     * @param StoreDoctorPriceRequest $request
     * @param StoreDoctorPriceHandler $handler
     * @param Doctor $doctor
     * @param DoctorPrice $price
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StoreDoctorPriceRequest $request, StoreDoctorPriceHandler $handler, Doctor $doctor, DoctorPrice $price)
    {

        if ($price = $handler->process($request, $doctor, $price))
        {
            return redirect()->route('doctor.price.index', $doctor)->with('message', __( 'Сохранено' ));
        }

        return back()->withErrors($handler->getErrors());

    }

    /**
     * @param Doctor $doctor
     * @param DoctorPrice $price
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Doctor $doctor, DoctorPrice $price)
    {

        if ($price->delete())
        {
            return redirect()->route('doctor.price.index', $doctor)->with('message', __( 'Удалено' ));
        }

        return back()->withErrors([__('Не удалось удалить запись')]);

    }
}
