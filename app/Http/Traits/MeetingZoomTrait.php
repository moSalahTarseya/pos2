<?php

namespace App\Http\Traits;

use App\Mail\MeetingMail;
use App\Models\Admin;
use App\Models\Appointment;
use App\Models\Consultation;
use App\Models\ModelNotification;
use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use MacsiDigital\Zoom\Facades\Zoom;


trait MeetingZoomTrait
{

    /**
     * this function use to create meeting zoom
     * @param $request
     * @return object of $meeting
     */
    protected function createMeeting($request)
    {
        $appointment = Appointment::findOrFail($request->appointment_id);
        $dur = Carbon::parse($appointment->time_to)->diffInMinutes(Carbon::parse($appointment->time_from));
        $user = Zoom::user()->first();
        $meetingData = [
            'topic' => Setting::keyLang('meeting_topic'),
            'password' => $request->password,
            'duration' => $dur,
            'start_time' =>$appointment->date.' '.$appointment->time_from,
            'timezone' =>'Africa/Cairo',
        ];

        $meeting = Zoom::meeting()->make($meetingData);
        $meeting->settings()->make([
            'join_before_host' => true,
            'host_video' => false,
            'participant_video' => true,
            'mute_upon_entry' => true,
            'approval_type' => config('zoom.approval_type'),
            'audio' => config('zoom.audio'),
            'auto_recording' => config('zoom.auto_recording'),
            'waiting_room' => true,
        ]);

        return  $user->meetings()->save($meeting);


    }


    /**
     * this used to make new request consultation
     * @param  object of $meeting
     * @param  object $reqest
     * @return object of $consuatation
     */
    protected function createConsultation($meeting, $request){

        $meeting_data = [
            'meeting_id' => $meeting->id,
            'topic'      => $meeting->topic,
            'start_time' => $meeting->start_time,
            'duration'   => $meeting->duration,
            'join_url' => $meeting->join_url,
            'start_url' => $meeting->start_url,
            'password' => $meeting->password,
        ];

        $data=[
            'user_id' => auth()->user()->id,
            'status' =>'paid',
            'paid_at' => date('Y-m-d H:i:s'),
            'appointment_id'=>$request->appointment_id ,
            'zoom_settings' =>json_encode($meeting_data),
        ];

        if ($request->is_for_another_person) {
            $personData = [
                'name' => $request->name,
                'phone' => $request->phone,
            ];
            $data['is_for_another_person'] = $request->is_for_another_person;
            $data['another_person_info'] = json_encode($personData);
        }

        $resource =  Consultation::create($data);
        $this->sendMail();
       $trans =[
        'ar'         => ['title'=>  __('lang.consultation_request', [], "ar"),'description'=>__('lang.nonification_consult_desc',[],'ar') . auth()->user()->name],
        'en'         => ['title'=>__('lang.consultation_request', [], "en"),'description'=>__('lang.nonification_consult_desc',[],'en') . auth()->user()->name],
       ];

       sendNotification(Admin::first(), $resource , $trans);
       return;
    }





    private function sendMail()
    {
        Mail::to(auth()->user()->email)->send(new MeetingMail());
        $admin = Admin::first();
        Mail::to($admin->email)->send(new MeetingMail());
    }
}
