<?php

namespace Database\Seeders;

use App\Models\Topic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'slug' => 'html-css',
                'name' => 'HTML & CSS',
                'description' => 'All about the building blocks of the web - HTML and CSS.',
            ],
            [
                'slug' => 'javascript',
                'name' => 'JavaScript',
                'description' => 'Discussions and questions about JavaScript, the language of the web.',
            ],
            [
                'slug' => 'frontend-frameworks',
                'name' => 'Frontend Frameworks',
                'description' => 'Talk about frameworks like React, Angular, Vue.js, and others.',
            ],
            [
                'slug' => 'backend-development',
                'name' => 'Backend Development',
                'description' => 'Dive into server-side languages and frameworks like Node.js, Django, Laravel, and more.',
            ],
            [
                'slug' => 'databases',
                'name' => 'Databases',
                'description' => 'Everything related to databases - SQL, NoSQL, database design, and optimization.',
            ],
            [
                'slug' => 'devops',
                'name' => 'DevOps',
                'description' => 'Discuss CI/CD, cloud services, containerization, and other DevOps practices.',
            ],
            [
                'slug' => 'web-security',
                'name' => 'Web Security',
                'description' => 'Topics on web security practices, vulnerabilities, and solutions.',
            ],
            [
                'slug' => 'ui-ux-design',
                'name' => 'UI/UX Design',
                'description' => 'Talk about user interface and user experience design principles and tools.',
            ],
            [
                'slug' => 'career-advice',
                'name' => 'Career Advice',
                'description' => 'Get advice on starting and advancing your career in web development.',
            ],
            [
                'slug' => 'project-showcase',
                'name' => 'Project Showcase',
                'description' => 'Share your web development projects and get feedback from the community.',
            ]
        ];

        Topic::upsert($data, ['slug']);
    }
}