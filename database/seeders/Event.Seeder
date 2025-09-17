<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Define the CSV path
        $csvFile = database_path('seeders/data/events.csv');

        // 2. Open the file
        if (!file_exists($csvFile) || !is_readable($csvFile)) {
            dd("CSV file not found or not readable at: " . $csvFile);
        }

        // 3. Read the file line by line
        if (($handle = fopen($csvFile, 'r')) !== false) {
            $header = fgetcsv($handle, 1000, ','); // read the first line as header

            // 4. Read the first row after header
            $row = fgetcsv($handle, 1000, ',');

            fclose($handle);

            // 5. Dump the row for debugging
            dd($header, $row);
        }
    }
}