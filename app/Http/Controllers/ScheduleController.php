<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Schedule\StoreRequest;
use App\Models\Classroom;
use App\Models\Schedule;
use App\Models\SchoolClass;
use \Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function store(Request $request)
    {
        $schoolClass = SchoolClass::where('number_class', $request->schoolClass_id)->orderBy('id', 'desc')->first();
        $classroom = Classroom::where('class_id', $schoolClass->id)->first();
        switch ($request->schoolClass_id) {
            case '1':
                for($i=1;$i<=4;$i++) {
                    DB::table('schedules')->insert([
                        [
                            'date_of_week' => 'Понедельник',
                            'callingSchedule_id' => $i,
                            'classRoom_id' => $classroom->class_id,
                            'item_id' => rand(1, 8),
                            'teacher_id' => $schoolClass->teacher_id,
                            'schoolClass_id' => $schoolClass->id
                        ]
                    ]);
                }
                for($i=1;$i<=4;$i++) {
                    DB::table('schedules')->insert([
                        [
                            'date_of_week' => 'Вторник',
                            'callingSchedule_id' => $i,
                            'classRoom_id' => $classroom->class_id,
                            'item_id' => rand(1, 8),
                            'teacher_id' => $schoolClass->teacher_id,
                            'schoolClass_id' => $schoolClass->id
                        ]
                    ]);
                }
                for($i=1;$i<=4;$i++) {
                    DB::table('schedules')->insert([
                        [
                            'date_of_week' => 'Среда',
                            'callingSchedule_id' => $i,
                            'classRoom_id' => $classroom->class_id,
                            'item_id' => rand(1, 8),
                            'teacher_id' => $schoolClass->teacher_id,
                            'schoolClass_id' => $schoolClass->id
                        ]
                    ]);
                }
                for($i=1;$i<=3;$i++) {
                    DB::table('schedules')->insert([
                        [
                            'date_of_week' => 'Четверг',
                            'callingSchedule_id' => $i,
                            'classRoom_id' => $classroom->class_id,
                            'item_id' => rand(1, 8),
                            'teacher_id' => $schoolClass->teacher_id,
                            'schoolClass_id' => $schoolClass->id
                        ]
                    ]);
                }
                for($i=1;$i<=4;$i++) {
                    DB::table('schedules')->insert([
                        [
                            'date_of_week' => 'Пятница',
                            'callingSchedule_id' => $i,
                            'classRoom_id' => $classroom->class_id,
                            'item_id' => rand(1, 8),
                            'teacher_id' => $schoolClass->teacher_id,
                            'schoolClass_id' => $schoolClass->id
                        ]
                    ]);
                }
                break;
                case '2':
                    for($i=1;$i<=4;$i++) {
                        DB::table('schedules')->insert([
                            [
                                'date_of_week' => 'Понедельник',
                                'callingSchedule_id' => $i,
                                'classRoom_id' => $classroom->class_id,
                                'item_id' => rand(1, 9),
                                'teacher_id' => $schoolClass->teacher_id,
                                'schoolClass_id' => $schoolClass->id
                            ]
                        ]);
                    }
                    for($i=1;$i<=5;$i++) {
                        DB::table('schedules')->insert([
                            [
                                'date_of_week' => 'Вторник',
                                'callingSchedule_id' => $i,
                                'classRoom_id' => $classroom->class_id,
                                'item_id' => rand(1, 9),
                                'teacher_id' => $schoolClass->teacher_id,
                                'schoolClass_id' => $schoolClass->id
                            ]
                        ]);
                    }
                    for($i=1;$i<=3;$i++) {
                        DB::table('schedules')->insert([
                            [
                                'date_of_week' => 'Среда',
                                'callingSchedule_id' => $i,
                                'classRoom_id' => $classroom->class_id,
                                'item_id' => rand(1, 9),
                                'teacher_id' => $schoolClass->teacher_id,
                                'schoolClass_id' => $schoolClass->id
                            ]
                        ]);
                    }
                    for($i=1;$i<=4;$i++) {
                        DB::table('schedules')->insert([
                            [
                                'date_of_week' => 'Четверг',
                                'callingSchedule_id' => $i,
                                'classRoom_id' => $classroom->class_id,
                                'item_id' => rand(1, 9),
                                'teacher_id' => $schoolClass->teacher_id,
                                'schoolClass_id' => $schoolClass->id
                            ]
                        ]);
                    }
                    for($i=1;$i<=4;$i++) {
                        DB::table('schedules')->insert([
                            [
                                'date_of_week' => 'Пятница',
                                'callingSchedule_id' => $i,
                                'classRoom_id' => $classroom->class_id,
                                'item_id' => rand(1, 9),
                                'teacher_id' => $schoolClass->teacher_id,
                                'schoolClass_id' => $schoolClass->id
                            ]
                        ]);
                    }
                    break;
                    case '3':
                        for($i=1;$i<=4;$i++) {
                            DB::table('schedules')->insert([
                                [
                                    'date_of_week' => 'Понедельник',
                                    'callingSchedule_id' => $i,
                                    'classRoom_id' => $classroom->class_id,
                                    'item_id' => rand(1, 10),
                                    'teacher_id' => $schoolClass->teacher_id,
                                    'schoolClass_id' => $schoolClass->id
                                ]
                            ]);
                        }
                        for($i=1;$i<=5;$i++) {
                            DB::table('schedules')->insert([
                                [
                                    'date_of_week' => 'Вторник',
                                    'callingSchedule_id' => $i,
                                    'classRoom_id' => $classroom->class_id,
                                    'item_id' => rand(1, 10),
                                    'teacher_id' => $schoolClass->teacher_id,
                                    'schoolClass_id' => $schoolClass->id
                                ]
                            ]);
                        }
                        for($i=1;$i<=5;$i++) {
                            DB::table('schedules')->insert([
                                [
                                    'date_of_week' => 'Среда',
                                    'callingSchedule_id' => $i,
                                    'classRoom_id' => $classroom->class_id,
                                    'item_id' => rand(1, 10),
                                    'teacher_id' => $schoolClass->teacher_id,
                                    'schoolClass_id' => $schoolClass->id
                                ]
                            ]);
                        }
                        for($i=1;$i<=4;$i++) {
                            DB::table('schedules')->insert([
                                [
                                    'date_of_week' => 'Четверг',
                                    'callingSchedule_id' => $i,
                                    'classRoom_id' => $classroom->class_id,
                                    'item_id' => rand(1, 10),
                                    'teacher_id' => $schoolClass->teacher_id,
                                    'schoolClass_id' => $schoolClass->id
                                ]
                            ]);
                        }
                        for($i=1;$i<=3;$i++) {
                            DB::table('schedules')->insert([
                                [
                                    'date_of_week' => 'Пятница',
                                    'callingSchedule_id' => $i,
                                    'classRoom_id' => $classroom->class_id,
                                    'item_id' => rand(1, 10),
                                    'teacher_id' => $schoolClass->teacher_id,
                                    'schoolClass_id' => $schoolClass->id
                                ]
                            ]);
                        }
                        break;
                        case '4':
                            for($i=1;$i<=3;$i++) {
                                DB::table('schedules')->insert([
                                    [
                                        'date_of_week' => 'Понедельник',
                                        'callingSchedule_id' => $i,
                                        'classRoom_id' => $classroom->class_id,
                                        'item_id' => rand(1, 10),
                                        'teacher_id' => $schoolClass->teacher_id,
                                        'schoolClass_id' => $schoolClass->id
                                    ]
                                ]);
                            }
                            for($i=1;$i<=5;$i++) {
                                DB::table('schedules')->insert([
                                    [
                                        'date_of_week' => 'Вторник',
                                        'callingSchedule_id' => $i,
                                        'classRoom_id' => $classroom->class_id,
                                        'item_id' => rand(1, 10),
                                        'teacher_id' => $schoolClass->teacher_id,
                                        'schoolClass_id' => $schoolClass->id
                                    ]
                                ]);
                            }
                            for($i=1;$i<=5;$i++) {
                                DB::table('schedules')->insert([
                                    [
                                        'date_of_week' => 'Среда',
                                        'callingSchedule_id' => $i,
                                        'classRoom_id' => $classroom->class_id,
                                        'item_id' => rand(1, 10),
                                        'teacher_id' => $schoolClass->teacher_id,
                                        'schoolClass_id' => $schoolClass->id
                                    ]
                                ]);
                            }
                            for($i=1;$i<=3;$i++) {
                                DB::table('schedules')->insert([
                                    [
                                        'date_of_week' => 'Четверг',
                                        'callingSchedule_id' => $i,
                                        'classRoom_id' => $classroom->class_id,
                                        'item_id' => rand(1, 10),
                                        'teacher_id' => $schoolClass->teacher_id,
                                        'schoolClass_id' => $schoolClass->id
                                    ]
                                ]);
                            }
                            for($i=1;$i<=4;$i++) {
                                DB::table('schedules')->insert([
                                    [
                                        'date_of_week' => 'Пятница',
                                        'callingSchedule_id' => $i,
                                        'classRoom_id' => $classroom->class_id,
                                        'item_id' => rand(1, 10),
                                        'teacher_id' => $schoolClass->teacher_id,
                                        'schoolClass_id' => $schoolClass->id
                                    ]
                                ]);
                            }
                            break;
                            case '5':
                                for($i=1;$i<=4;$i++) {
                                    DB::table('schedules')->insert([
                                        [
                                            'date_of_week' => 'Понедельник',
                                            'callingSchedule_id' => $i,
                                            'classRoom_id' => NULL,
                                            'item_id' => rand(6, 17),
                                            'teacher_id' => NULL,
                                            'schoolClass_id' => $schoolClass->id
                                        ]
                                    ]);
                                }
                                for($i=1;$i<=6;$i++) {
                                    DB::table('schedules')->insert([
                                        [
                                            'date_of_week' => 'Вторник',
                                            'callingSchedule_id' => $i,
                                            'classRoom_id' => NULL,
                                            'item_id' => rand(6, 17),
                                            'teacher_id' => NULL,
                                            'schoolClass_id' => $schoolClass->id
                                        ]
                                    ]);
                                }
                                for($i=1;$i<=6;$i++) {
                                    DB::table('schedules')->insert([
                                        [
                                            'date_of_week' => 'Среда',
                                            'callingSchedule_id' => $i,
                                            'classRoom_id' => NULL,
                                            'item_id' => rand(6, 17),
                                            'teacher_id' => NULL,
                                            'schoolClass_id' => $schoolClass->id
                                        ]
                                    ]);
                                }
                                for($i=1;$i<=4;$i++) {
                                    DB::table('schedules')->insert([
                                        [
                                            'date_of_week' => 'Четверг',
                                            'callingSchedule_id' => $i,
                                            'classRoom_id' => NULL,
                                            'item_id' => rand(6, 17),
                                            'teacher_id' => NULL,
                                            'schoolClass_id' => $schoolClass->id
                                        ]
                                    ]);
                                }
                                for($i=1;$i<=5;$i++) {
                                    DB::table('schedules')->insert([
                                        [
                                            'date_of_week' => 'Пятница',
                                            'callingSchedule_id' => $i,
                                            'classRoom_id' => NULL,
                                            'item_id' => rand(6, 17),
                                            'teacher_id' =>  NULL,
                                            'schoolClass_id' => $schoolClass->id
                                        ]
                                    ]);
                                }
                                break;
                                case '6':
                                    for($i=1;$i<=5;$i++) {
                                        DB::table('schedules')->insert([
                                            [
                                                'date_of_week' => 'Понедельник',
                                                'callingSchedule_id' => $i,
                                                'classRoom_id' => NULL,
                                                'item_id' => rand(6, 17),
                                                'teacher_id' => NULL,
                                                'schoolClass_id' => $schoolClass->id
                                            ]
                                        ]);
                                    }
                                    for($i=1;$i<=6;$i++) {
                                        DB::table('schedules')->insert([
                                            [
                                                'date_of_week' => 'Вторник',
                                                'callingSchedule_id' => $i,
                                                'classRoom_id' => NULL,
                                                'item_id' => rand(6, 17),
                                                'teacher_id' => NULL,
                                                'schoolClass_id' => $schoolClass->id
                                            ]
                                        ]);
                                    }
                                    for($i=1;$i<=5;$i++) {
                                        DB::table('schedules')->insert([
                                            [
                                                'date_of_week' => 'Среда',
                                                'callingSchedule_id' => $i,
                                                'classRoom_id' => NULL,
                                                'item_id' => rand(6, 17),
                                                'teacher_id' => NULL,
                                                'schoolClass_id' => $schoolClass->id
                                            ]
                                        ]);
                                    }
                                    for($i=1;$i<=6;$i++) {
                                        DB::table('schedules')->insert([
                                            [
                                                'date_of_week' => 'Четверг',
                                                'callingSchedule_id' => $i,
                                                'classRoom_id' => NULL,
                                                'item_id' => rand(6, 17),
                                                'teacher_id' => NULL,
                                                'schoolClass_id' => $schoolClass->id
                                            ]
                                        ]);
                                    }
                                    for($i=1;$i<=5;$i++) {
                                        DB::table('schedules')->insert([
                                            [
                                                'date_of_week' => 'Пятница',
                                                'callingSchedule_id' => $i,
                                                'classRoom_id' => NULL,
                                                'item_id' => rand(6, 17),
                                                'teacher_id' =>  NULL,
                                                'schoolClass_id' => $schoolClass->id
                                            ]
                                        ]);
                                    }
                                    break;
                                    case '7':
                                        for($i=1;$i<=6;$i++) {
                                            DB::table('schedules')->insert([
                                                [
                                                    'date_of_week' => 'Понедельник',
                                                    'callingSchedule_id' => $i,
                                                    'classRoom_id' => NULL,
                                                    'item_id' => rand(6, 17),
                                                    'teacher_id' => NULL,
                                                    'schoolClass_id' => $schoolClass->id
                                                ]
                                            ]);
                                        }
                                        for($i=1;$i<=8;$i++) {
                                            DB::table('schedules')->insert([
                                                [
                                                    'date_of_week' => 'Вторник',
                                                    'callingSchedule_id' => $i,
                                                    'classRoom_id' => NULL,
                                                    'item_id' => rand(6, 17),
                                                    'teacher_id' => NULL,
                                                    'schoolClass_id' => $schoolClass->id
                                                ]
                                            ]);
                                        }
                                        for($i=1;$i<=7;$i++) {
                                            DB::table('schedules')->insert([
                                                [
                                                    'date_of_week' => 'Среда',
                                                    'callingSchedule_id' => $i,
                                                    'classRoom_id' => NULL,
                                                    'item_id' => rand(6, 17),
                                                    'teacher_id' => NULL,
                                                    'schoolClass_id' => $schoolClass->id
                                                ]
                                            ]);
                                        }
                                        for($i=1;$i<=6;$i++) {
                                            DB::table('schedules')->insert([
                                                [
                                                    'date_of_week' => 'Четверг',
                                                    'callingSchedule_id' => $i,
                                                    'classRoom_id' => NULL,
                                                    'item_id' => rand(6, 17),
                                                    'teacher_id' => NULL,
                                                    'schoolClass_id' => $schoolClass->id
                                                ]
                                            ]);
                                        }
                                        for($i=1;$i<=8;$i++) {
                                            DB::table('schedules')->insert([
                                                [
                                                    'date_of_week' => 'Пятница',
                                                    'callingSchedule_id' => $i,
                                                    'classRoom_id' => NULL,
                                                    'item_id' => rand(6, 17),
                                                    'teacher_id' =>  NULL,
                                                    'schoolClass_id' => $schoolClass->id
                                                ]
                                            ]);
                                        }
                                        break;
                                        case '8':
                                            for($i=1;$i<=7;$i++) {
                                                DB::table('schedules')->insert([
                                                    [
                                                        'date_of_week' => 'Понедельник',
                                                        'callingSchedule_id' => $i,
                                                        'classRoom_id' => NULL,
                                                        'item_id' => rand(6, 17),
                                                        'teacher_id' => NULL,
                                                        'schoolClass_id' => $schoolClass->id
                                                    ]
                                                ]);
                                            }
                                            for($i=1;$i<=7;$i++) {
                                                DB::table('schedules')->insert([
                                                    [
                                                        'date_of_week' => 'Вторник',
                                                        'callingSchedule_id' => $i,
                                                        'classRoom_id' => NULL,
                                                        'item_id' => rand(6, 17),
                                                        'teacher_id' => NULL,
                                                        'schoolClass_id' => $schoolClass->id
                                                    ]
                                                ]);
                                            }
                                            for($i=1;$i<=8;$i++) {
                                                DB::table('schedules')->insert([
                                                    [
                                                        'date_of_week' => 'Среда',
                                                        'callingSchedule_id' => $i,
                                                        'classRoom_id' => NULL,
                                                        'item_id' => rand(6, 17),
                                                        'teacher_id' => NULL,
                                                        'schoolClass_id' => $schoolClass->id
                                                    ]
                                                ]);
                                            }
                                            for($i=1;$i<=7;$i++) {
                                                DB::table('schedules')->insert([
                                                    [
                                                        'date_of_week' => 'Четверг',
                                                        'callingSchedule_id' => $i,
                                                        'classRoom_id' => NULL,
                                                        'item_id' => rand(6, 17),
                                                        'teacher_id' => NULL,
                                                        'schoolClass_id' => $schoolClass->id
                                                    ]
                                                ]);
                                            }
                                            for($i=1;$i<=7;$i++) {
                                                DB::table('schedules')->insert([
                                                    [
                                                        'date_of_week' => 'Пятница',
                                                        'callingSchedule_id' => $i,
                                                        'classRoom_id' => NULL,
                                                        'item_id' => rand(6, 17),
                                                        'teacher_id' =>  NULL,
                                                        'schoolClass_id' => $schoolClass->id
                                                    ]
                                                ]);
                                            }
                                            break;
                                            case '9':
                                                for($i=1;$i<=8;$i++) {
                                                    DB::table('schedules')->insert([
                                                        [
                                                            'date_of_week' => 'Понедельник',
                                                            'callingSchedule_id' => $i,
                                                            'classRoom_id' => NULL,
                                                            'item_id' => rand(6, 17),
                                                            'teacher_id' => NULL,
                                                            'schoolClass_id' => $schoolClass->id
                                                        ]
                                                    ]);
                                                }
                                                for($i=1;$i<=8;$i++) {
                                                    DB::table('schedules')->insert([
                                                        [
                                                            'date_of_week' => 'Вторник',
                                                            'callingSchedule_id' => $i,
                                                            'classRoom_id' => NULL,
                                                            'item_id' => rand(6, 17),
                                                            'teacher_id' => NULL,
                                                            'schoolClass_id' => $schoolClass->id
                                                        ]
                                                    ]);
                                                }
                                                for($i=1;$i<=6;$i++) {
                                                    DB::table('schedules')->insert([
                                                        [
                                                            'date_of_week' => 'Среда',
                                                            'callingSchedule_id' => $i,
                                                            'classRoom_id' => NULL,
                                                            'item_id' => rand(6, 17),
                                                            'teacher_id' => NULL,
                                                            'schoolClass_id' => $schoolClass->id
                                                        ]
                                                    ]);
                                                }
                                                for($i=1;$i<=7;$i++) {
                                                    DB::table('schedules')->insert([
                                                        [
                                                            'date_of_week' => 'Четверг',
                                                            'callingSchedule_id' => $i,
                                                            'classRoom_id' => NULL,
                                                            'item_id' => rand(6, 17),
                                                            'teacher_id' => NULL,
                                                            'schoolClass_id' => $schoolClass->id
                                                        ]
                                                    ]);
                                                }
                                                for($i=1;$i<=8;$i++) {
                                                    DB::table('schedules')->insert([
                                                        [
                                                            'date_of_week' => 'Пятница',
                                                            'callingSchedule_id' => $i,
                                                            'classRoom_id' => NULL,
                                                            'item_id' => rand(6, 17),
                                                            'teacher_id' =>  NULL,
                                                            'schoolClass_id' => $schoolClass->id
                                                        ]
                                                    ]);
                                                }
                                                break;
            }
        return redirect()->back();
    }

    public function update(Schedule $schedule,Request $request)
    {
        $schedule->update([
            'date_of_week' => $request->date_of_week,
            'callingSchedule_id' => $request->callingSchedule_id,
            'classRoom_id' => $request->classRoom_id,
            'item_id' => $request->item_id,
            'teacher_id' => $request->teacher_id,
            'schoolClass_id' => $request->schoolClass_id
        ]);

        return redirect()->back();
    }
    public function delete(Schedule $schedule)
    {
        $schedule->delete();
        return redirect()->back();
    }
}
