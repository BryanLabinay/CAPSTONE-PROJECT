<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('services')->insert([
            [
                'service' => 'Consultation',
                'description' => 'General check-ups and health assessments are conducted by licensed physicians to monitor and maintain overall health. These assessments involve a comprehensive examination of vital signs, including blood pressure, heart rate, and body temperature. Physicians also evaluate physical health through a thorough physical examination. During the visit, they review the patient’s medical history, lifestyle habits, and any existing health concerns. These assessments help identify risk factors for conditions like hypertension, diabetes, or heart disease. Patients receive personalized advice on improving or maintaining their health based on the findings. The check-up allows for early detection of potential health issues, ensuring timely intervention and treatment. Routine assessments are crucial for preventing complications and promoting long-term well-being. Licensed physicians play a key role in guiding patients toward healthier lifestyle choices. General check-ups are an essential part of preventive care, helping individuals stay proactive about their health.',
                'img' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'service' => 'X-ray',
                'description' => 'The imaging service is essential for evaluating internal conditions of the body. It involves examinations of bones, the chest, and other internal organs. These services are used to detect fractures, infections, and other abnormalities. Through advanced imaging techniques, doctors can ensure precise and accurate diagnoses. This accuracy is vital for effective treatment and improved patient outcomes. Imaging services play a crucial role in monitoring a patient’s health over time. They also assist healthcare providers in making informed medical decisions. By identifying issues early, imaging helps prevent complications and ensures timely intervention. The results from imaging tests guide treatment plans tailored to a patient’s specific needs. Overall, these services are a cornerstone of modern healthcare, promoting better diagnosis and care.',
                'img' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'service' => 'Electrocardiogram(ECG)',
                'description' => 'The test is used to monitor the hearts electrical activity and overall function. It helps detect irregular heart rhythms, such as arrhythmias, and other cardiac conditions. By recording the hearts electrical signals, the test provides critical diagnostic information. This allows doctors to identify heart-related issues at an early stage. Early detection is key to preventing serious complications and improving patient outcomes. The test is quick, non-invasive, and widely used in clinical settings. It plays a crucial role in evaluating symptoms like chest pain, dizziness, or palpitations. Additionally, it assists doctors in planning the most appropriate treatment and care for patients. The results help guide decisions on medications, therapies, or lifestyle changes. Overall, the test is a vital tool in maintaining heart health and ensuring timely medical intervention.',
                'img' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'service' => 'Ultrasound',
                'description' => 'The imaging service is designed to assess internal organs, providing detailed insights into their condition. It includes abdominal and pelvic exams to examine organs such as the liver, kidneys, pancreas, and reproductive organs. These exams help detect abnormalities like tumors, cysts, or inflammation. Advanced imaging techniques ensure clear and accurate visuals for proper diagnosis. The service is non-invasive, making it safe and comfortable for patients. Physicians rely on these images to evaluate organ health and identify potential issues early. Abdominal imaging can reveal conditions such as gallstones, liver disease, or kidney problems. Pelvic exams are crucial for detecting concerns like ovarian cysts, uterine fibroids, or other gynecological conditions. Early detection through imaging allows timely treatment and better patient outcomes. This service plays a vital role in monitoring internal organ health and supporting overall medical care.',
                'img' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'service' => 'Labaratory',
                'description' => 'The testing service includes blood, urine, and other diagnostic tests for comprehensive health evaluation. Blood tests help assess overall health, detect infections, and monitor organ function. Urine tests provide insights into kidney health, hydration levels, and metabolic conditions. Additional diagnostic tests may examine cholesterol, blood sugar, or hormone levels. These tests are essential for detecting diseases early and preventing potential complications. Physicians use the results to diagnose conditions such as diabetes, anemia, or infections. Regular health evaluations allow for monitoring changes in a patient’s health over time. Accurate diagnostic tests ensure proper treatment plans and medical decisions. Early identification of issues through testing improves outcomes and promotes overall well-being. These services are a critical part of preventive and routine healthcare.',
                'img' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'service' => 'Drug Test',
                'description' => 'The screening service is designed to detect substance use in individuals. It is commonly required for employment to ensure a safe and drug-free workplace. These tests check for the presence of drugs, alcohol, or other substances in the body. They may involve analyzing samples such as urine, blood, or saliva. Employers use this screening to comply with company policies and legal regulations. It helps identify substance use that may affect job performance or safety. Screening is often conducted before hiring and may also be part of regular workplace monitoring. Accurate results ensure fair and reliable evaluations for all applicants or employees. This service promotes a healthy and productive work environment. It is a standard part of employment processes in many industries.',
                'img' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
