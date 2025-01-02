<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DepartmentModel;
use App\Models\CourseModel;

class DepartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $DEPARTMENTS_LIST = [
            [
                'department_name' => 'College of Fisheries and Allied Sciences',
                'department_accronym' => 'CFAS',
                'courses' => [
                    [
                        'course_name' => 'Bachelor of Science in Fisheries',
                        'course_accronym' => 'BSF'
                    ]
                ]
            ],
            [
                'department_name' => 'College of Education',
                'department_accronym' => 'COED',
                'courses' => [
                    [
                        'course_name' => 'Bachelor in Physical Education',
                        'course_accronym' => 'BPEd'
                    ],
                    [
                        'course_name' => 'Bachelor in Secondary Education',
                        'course_accronym' => 'BSED'
                    ],
                    [
                        'course_name' => 'Bachelor of Secondary Education Major in English',
                        'course_accronym' => 'BSEd-English'
                    ],
                    [
                        'course_name' => 'Bachelor of Secondary Education Major in Mathematics',
                        'course_accronym' => 'BSEd-Mathematics'
                    ],
                    [
                        'course_name' => 'Bachelor of Secondary Education Major in Science',
                        'course_accronym' => 'BSEd-Science'
                    ],
                    [
                        'course_name' => 'Bachelor of Secondary Education major in Technology and Livelihood Education',
                        'course_accronym' => 'BSEd-TLE'
                    ],
                    [
                        'course_name' => 'Bachelor of Technology and Livelihood Education Major in Agri-Fishery Arts',
                        'course_accronym' => 'BTLEd-AFA'
                    ],
                    [
                        'course_name' => 'Bachelor of Technology and Livelihood Education Major in Home Economics',
                        'course_accronym' => 'BTLEd-HE'
                    ],
                    [
                        'course_name' => 'Bachelor of Technology and Livelihood Education Major in Industrial Arts',
                        'course_accronym' => 'BTLEd-IA'
                    ],
                    [
                        'course_name' => 'Bachelor of Technology and Livelihood Education Major in Information and Communications Technology',
                        'course_accronym' => 'BTLEd-ICT'
                    ]
                ]
            ],
            [
                'department_name' => 'College of Criminal Justice Education',
                'department_accronym' => 'CCJE',
                'courses' => [
                    [
                        'course_name' => 'Bachelor of Science in Criminology',
                        'course_accronym' => 'BSCrim'
                    ]
                ]
            ],
            [
                'department_name' => 'College of Nursing and Allied Health Sciences',
                'department_accronym' => 'CONAHS',
                'courses' => [
                    [
                        'course_name' => 'Bachelor of Science in Nursing',
                        'course_accronym' => 'BSN'
                    ]
                ]
            ],
            [
                'department_name' => 'College of Information and Communications Technology and Engineering',
                'department_accronym' => 'CICTE',
                'courses' => [
                    [
                        'course_name' => 'Bachelor of Library and Information Science',
                        'course_accronym' => 'BLIS'
                    ],
                    [
                        'course_name' => 'Bachelor of Science in Entertainment and Multimedia Computing major in Animation Technology',
                        'course_accronym' => 'BSEMC-A'
                    ],
                    [
                        'course_name' => 'Bachelor of Science in Information Systems',
                        'course_accronym' => 'BSIS'
                    ],
                    [
                        'course_name' => 'Bachelor of Science in Information Technology',
                        'course_accronym' => 'BSIT'
                    ]
                ]
            ],
            [
                'department_name' => 'College of Arts and Sciences',
                'department_accronym' => 'CAS',
                'courses' => [
                    [
                        'course_name' => 'Bachelor of Science in Biology',
                        'course_accronym' => 'BSBIO'
                    ],
                    [
                        'course_name' => 'Bachelor of Arts in English Language Studies',
                        'course_accronym' => 'ABELS'
                    ]
                ]
            ],
            [
                'department_name' => 'College of Business and Management',
                'department_accronym' => 'CBM',
                'courses' => [
                    [
                        'course_name' => 'Bachelor of Public Administration',
                        'course_accronym' => 'BPA'
                    ],
                    [
                        'course_name' => 'Bachelor of Science in Accounting Information Systems',
                        'course_accronym' => 'BSAIS'
                    ],
                    [
                        'course_name' => 'Bachelor of Science in Business Administration major in Financial Management',
                        'course_accronym' => 'BSBA-FM'
                    ],
                    [
                        'course_name' => 'Bachelor of Science in Business Administration major in Marketing Management',
                        'course_accronym' => 'BSBA-MM'
                    ],
                    [
                        'course_name' => 'Bachelor of Science in Cooperative Management',
                        'course_accronym' => 'BSCM'
                    ],
                    [
                        'course_name' => 'Bachelor of Science in Hospitality Management',
                        'course_accronym' => 'BSHM'
                    ],
                    [
                        'course_name' => 'Bachelor of Science in Tourism Management',
                        'course_accronym' => 'BSTM'
                    ]
                ]
            ],
            [
                'department_name' => 'College of Agriculture and Allied Sciences',
                'department_accronym' => 'CAAS',
                'courses' => [
                    [
                        'course_name' => 'Bachelor of Science in Agribusiness',
                        'course_accronym' => 'BSAB'
                    ],
                    [
                        'course_name' => 'Bachelor of Science in Agriculture',
                        'course_accronym' => 'BSA'
                    ]
                ]
            ]
        ];

        foreach($DEPARTMENTS_LIST as $department) {
            $department_data = [
                'department_name' => $department['department_name'],
                'department_accronym' => $department['department_accronym'],
            ];

            $existing_department = DepartmentModel::where('department_name', $department['department_name'])->first();
            
            if($existing_department){
                $created_department = $existing_department;
            } else {
                $created_department = DepartmentModel::create($department_data);
            }

            if($department){
                $department_id = $created_department->id;
                
                foreach($department['courses'] as $course){
                    $course_data = [
                        'department_id' => $department_id,
                        'course_name' => $course['course_name'],
                        'course_accronym' => $course['course_accronym']
                    ];
                    
                    $existing_course = CourseModel::where('course_name', $course['course_name'])->first();

                    if(!$existing_course){
                        CourseModel::create($course_data);
                    }
                }
            }
        }
    }
}
