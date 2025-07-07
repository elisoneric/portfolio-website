<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Skill;
use App\Models\Project;

class PortfolioSeeder extends Seeder
{
    public function run()
    {
        // Only seed if tables are empty
        if (Skill::count() > 0 || Project::count() > 0) {
            return;
        }

        try {
            DB::beginTransaction();

            // Create all skills first
            $skills = [
                [
                    'name' => 'Machine Learning',
                    'proficiency' => 90,
                    'category' => 'AI/ML',
                    'icon' => 'fas fa-robot'
                ],
                [
                    'name' => 'Deep Learning',
                    'proficiency' => 85,
                    'category' => 'AI/ML',
                    'icon' => 'fas fa-brain'
                ],
                [
                    'name' => 'Natural Language Processing',
                    'proficiency' => 80,
                    'category' => 'AI/ML',
                    'icon' => 'fas fa-language'
                ],
                [
                    'name' => 'Python',
                    'proficiency' => 95,
                    'category' => 'Programming',
                    'icon' => 'fab fa-python'
                ],
                [
                    'name' => 'TensorFlow',
                    'proficiency' => 85,
                    'category' => 'Framework',
                    'icon' => 'fas fa-project-diagram'
                ],
                [
                    'name' => 'PyTorch',
                    'proficiency' => 80,
                    'category' => 'Framework',
                    'icon' => 'fas fa-network-wired'
                ]
            ];

            $createdSkills = [];
            foreach ($skills as $skillData) {
                $createdSkills[strtolower($skillData['name'])] = Skill::create($skillData);
            }

            // Create all projects
            $projects = [
                [
                    'title' => 'Sentiment Analysis Tool',
                    'description' => 'A machine learning model that analyzes customer reviews and classifies sentiment using NLP.',
                    'image_url' => 'https://via.placeholder.com/600x400?text=Sentiment+Analysis',
                    'demo_url' => 'https://example.com/sentiment-demo',
                    'skills' => ['machine learning', 'natural language processing', 'python', 'tensorflow']
                ],
                [
                    'title' => 'Image Classification System',
                    'description' => 'Deep learning model that classifies images into 100 categories using CNNs.',
                    'image_url' => 'https://via.placeholder.com/600x400?text=Image+Classifier',
                    'demo_url' => 'https://example.com/image-classifier',
                    'skills' => ['deep learning', 'python', 'pytorch']
                ],
                [
                    'title' => 'Stock Price Predictor',
                    'description' => 'Predicts stock prices using LSTM neural networks for time-series forecasting.',
                    'image_url' => 'https://via.placeholder.com/600x400?text=Stock+Predictor',
                    'demo_url' => null,
                    'skills' => ['machine learning', 'python', 'tensorflow']
                ]
            ];

            foreach ($projects as $projectData) {
                $skillsToAttach = $projectData['skills'];
                unset($projectData['skills']);
                
                $project = Project::create($projectData);
                
                // Attach skills
                foreach ($skillsToAttach as $skillName) {
                    $skillName = strtolower($skillName);
                    if (isset($createdSkills[$skillName])) {
                        $project->skills()->attach($createdSkills[$skillName]->id);
                    }
                }
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}