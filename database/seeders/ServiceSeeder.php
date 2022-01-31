<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Service = [
            [
            'title' => 'Communication Services',
            'parent' => null,
            ],
            [
            'title' => 'Communication Services',
            'parent' => 1,
            ],
            [
            'title' => 'Express Courier Services',
            'parent' => 1,
            ],
            [
            'title' => 'Internet/Data Services',
            'parent' => 1,
            ],
            [
            'title' => 'Postal Services',
            'parent' => 1,
            ],
            [
            'title' => 'Consultancy and Professional Services',
            'parent' => null,
            ],
            [
            'title' => 'Accountancy',
            'parent' => 6,
            ],
            [
            'title' => 'Administrative Management',
            'parent' => 6,
            ],
            [
            'title' => 'Aerospace',
            'parent' => 6,
            ],
            [
            'title' => 'Architecture',
            'parent' => 6,
            ],
            [
            'title' => 'Audit',
            'parent' => 6,
            ],
            [
            'title' => 'Biomedical',
            'parent' => 6,
            ],
            [
            'title' => 'Building Electrical Services',
            'parent' => 6,
            ],
            [
            'title' => 'Building Inspection',
            'parent' => 6,
            ],
            [
            'title' => 'Building Mechanical Services',
            'parent' => 6,
            ],
            [
            'title' => 'Business Consultancy/Strategy/Operations',
            'parent' => 6,
            ],
            [
            'title' => 'Chemical',
            'parent' => 6,
            ],
            [
            'title' => 'Civil',
            'parent' => 6,
            ],
            [
            'title' => 'Computer Engineering',
            'parent' => 6,
            ],
            [
            'title' => 'Culture and Entertainment',
            'parent' => 6,
            ],
            [
            'title' => 'Dentists',
            'parent' => 6,
            ],
            [
            'title' => 'Design Architect',
            'parent' => 6,
            ],
            [
            'title' => 'Electrical',
            'parent' => 6,
            ],
            [
            'title' => 'Electronics & Electronic Systems',
            'parent' => 6,
            ],
            [
            'title' => 'Engineering',
            'parent' => 6,
            ],
            [
            'title' => 'Environmental',
            'parent' => 6,
            ],
            [
            'title' => 'Environmental',
            'parent' => 6,
            ],
            [
            'title' => 'Equipment',
            'parent' => 6,
            ],
            [
            'title' => 'Estate/Facilities',
            'parent' => 6,
            ],
            [
            'title' => 'Foreign Training Providers',
            'parent' => 6,
            ],
            [
            'title' => 'Geophysical/Hydrographic',
            'parent' => 6,
            ],
            [
            'title' => 'Geotechnical',
            'parent' => 6,
            ],
            [
            'title' => 'Graphic Design and Publishing',
            'parent' => 6,
            ],
            [
            'title' => 'IT Audit and Security',
            'parent' => 6,
            ],
            [
            'title' => 'IT Infrastructure Services',
            'parent' => 6,
            ],
            [
            'title' => 'IT Strategy Development',
            'parent' => 6,
            ],
            [
            'title' => 'Information Technology',
            'parent' => 6,
            ],
            [
            'title' => 'Land',
            'parent' => 6,
            ],
            [
            'title' => 'Lawyers',
            'parent' => 6,
            ],
            [
            'title' => 'Legal Services',
            'parent' => 6,
            ],
            [
            'title' => 'Local Training Providers',
            'parent' => 6,
            ],
            [
            'title' => 'Management Services',
            'parent' => 6,
            ],
            [
            'title' => 'Manufacturing Systems',
            'parent' => 6,
            ],
            [
            'title' => 'Marketing',
            'parent' => 6,
            ],
            [
            'title' => 'Mechanical',
            'parent' => 6,
            ],
            [
            'title' => 'Medical Doctors',
            'parent' => 6,
            ],
            [
            'title' => 'Medical and Health Services',
            'parent' => 6,
            ],
            [
            'title' => 'Mineral/Soil',
            'parent' => 6,
            ],
            [
            'title' => 'Notaries',
            'parent' => 6,
            ],
            [
            'title' => 'Nurses',
            'parent' => 6,
            ],
            [
            'title' => 'Other Specialized Medical Service Providers',
            'parent' => 6,
            ],
            [
            'title' => 'Personnel Management/Staffing/Human Capital Development',
            'parent' => 6,
            ],
            [
            'title' => 'Petroleum',
            'parent' => 6,
            ],
            [
            'title' => 'Power Systems',
            'parent' => 6,
            ],
            [
            'title' => 'Project Consultant',
            'parent' => 6,
            ],
            [
            'title' => 'Project Manager',
            'parent' => 6,
            ],
            [
            'title' => 'Public Relations Media',
            'parent' => 6,
            ],
            [
            'title' => 'Purchasing and Supply Management',
            'parent' => 6,
            ],
            [
            'title' => 'Quantity',
            'parent' => 6,
            ],
            [
            'title' => 'Research and Development',
            'parent' => 6,
            ],
            [
            'title' => 'Sciences and Investigations',
            'parent' => 6,
            ],
            [
            'title' => 'Social and Community Services',
            'parent' => 6,
            ],
            [
            'title' => 'Software Hosting Services',
            'parent' => 6,
            ],
            [
            'title' => 'Software Development',
            'parent' => 6,
            ],
            [
            'title' => 'Solicitors',
            'parent' => 6,
            ],
            [
            'title' => 'Structural',
            'parent' => 6,
            ],
            [
            'title' => 'Surveying',
            'parent' => 6,
            ],
            [
            'title' => 'Taxation',
            'parent' => 6,
            ],
            [
            'title' => 'Town and Regional Planning',
            'parent' => 6,
            ],
            [
            'title' => 'Training and Education',
            'parent' => 6,
            ],
            [
            'title' => 'Transportation',
            'parent' => 6,
            ],
            [
            'title' => 'Transportation Systems',
            'parent' => 6,
            ],
            [
            'title' => 'Valuation',
            'parent' => 6,
            ],
            [
            'title' => 'Water',
            'parent' => 6,
            ],
            [
            'title' => 'Facilities Rental',
            'parent' => null,
            ],
            [
            'title' => 'Building Lease and Rent',
            'parent' => 75,
            ],
            [
            'title' => 'Estate Management',
            'parent' => 75,
            ],
            [
            'title' => 'Financial Services',
            'parent' => null,
            ],
            [
            'title' => 'Banking Services',
            'parent' => 78,
            ],
            [
            'title' => 'Insurance Brokers',
            'parent' => 78,
            ],
            [
            'title' => 'Insurance Loss Adjusters',
            'parent' => 78,
            ],
            [
            'title' => 'Insurance Providers',
            'parent' => 78,
            ],
            [
            'title' => 'Insurance Services',
            'parent' => 78,
            ],
            [
            'title' => 'Investment Managers',
            'parent' => 78,
            ],
            [
            'title' => 'Investment Services',
            'parent' => 78,
            ],
            [
            'title' => 'Pensions Administrators',
            'parent' => 78,
            ],
            [
            'title' => 'Trust and Custodial Services',
            'parent' => 78,
            ],
            [
            'title' => 'Maintenance Services',
            'parent' => null,
            ],
            [
            'title' => 'Building Maintenance',
            'parent' => 88,
            ],
            [
            'title' => 'Building Repairs',
            'parent' => 88,
            ],
            [
            'title' => 'Dredging of Drainage Channels',
            'parent' => 88,
            ],
            [
            'title' => 'Equipment Maintenance',
            'parent' => 88,
            ],
            [
            'title' => 'Furniture Maintenance',
            'parent' => 88,
            ],
            [
            'title' => 'Janitorial/Cleaning Services',
            'parent' => 88,
            ],
            [
            'title' => 'Landscaping Services',
            'parent' => 88,
            ],
            [
            'title' => 'Maintenance cleaning of Drainage Channels',
            'parent' => 88,
            ],
            [
            'title' => 'Waste Disposal',
            'parent' => 88,
            ],
            [
            'title' => 'Media and Communication Services',
            'parent' => null,
            ],
            [
            'title' => 'Direct Mail',
            'parent' => 98,
            ],
            [
            'title' => 'Door-to-Door Campaigns',
            'parent' => 98,
            ],
            [
            'title' => 'Online/Internet',
            'parent' => 98,
            ],
            [
            'title' => 'Outdoor/Billboards',
            'parent' => 98,
            ],
            [
            'title' => 'Print',
            'parent' => 98,
            ],
            [
            'title' => 'Radio/TV',
            'parent' => 98,
            ],
            [
            'title' => 'Security Services',
            'parent' => null,
            ],
            [
            'title' => 'Building and Facilities',
            'parent' => 106,
            ],
            [
            'title' => 'Private Investigative Services',
            'parent' => 106,
            ],
            [
            'title' => 'VIP Protection',
            'parent' => 106,
            ],
            [
            'title' => 'Travel and Hospitality Services',
            'parent' => null,
            ],
            [
            'title' => 'Air Travel',
            'parent' => 110,
            ],
            [
            'title' => 'Car/Bus Hire',
            'parent' => 110,
            ],
            [
            'title' => 'Food and Catering Services',
            'parent' => 110,
            ],
            [
            'title' => 'Hotels and Accommodation',
            'parent' => 110,
            ],
            [
            'title' => 'Planning and Management',
            'parent' => 110,
            ],
            [
            'title' => 'Rail Travel',
            'parent' => 110,
            ],
            [
            'title' => 'Ship/Water Transport',
            'parent' => 110,
            ],
            [
            'title' => 'Travel Reservations & Booking',
            'parent' => 110,
            ],
            [
            'title' => 'Utilities',
            'parent' => null,
            ],
            [
            'title' => 'Electricity',
            'parent' => 119,
            ],
            [
            'title' => 'Water',
            'parent' => 119,
            ]
        ];
        Service::insert($Service);
    }
}
