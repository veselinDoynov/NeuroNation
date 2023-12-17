<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class Repository
{

    public function getCategories() : array {
        return DB::select("SELECT * FROM categories");
    }

    public function getUser(int $userId) :bool {
        return !empty(DB::select("Select 1 From users Where id = ". (int)$userId));
    }

    public function getSessionSummary(int $userId): array {
        $query = "SELECT SUM(s.score) as score, s.identifier as session FROM sessions s
                  JOIN exercises e ON e.id = s.exercise_id
                  JOIN users u ON u.id = s.user_id
                  WHERE u.id = {$userId}
                  GROUP BY s.identifier";

        return DB::select($query);
    }

    public function getSessionSummaryPerCategory(int $userId): array {
        $query = "SELECT SUM(s.score) as score, c.name as category, s.identifier as session FROM sessions s
                  JOIN exercises e ON e.id = s.exercise_id
                  JOIN categories c ON c.id = e.category_id
                  JOIN users u ON u.id = s.user_id
                  WHERE u.id = {$userId}
                  GROUP BY s.identifier, c.id";

        return DB::select($query);
    }

    public function getSessionDate(int $userId, string $identifier) {
        $identifier = DB::connection()->getPdo()->quote($identifier);
        $query = "Select MAX(updated_at) as date From sessions Where user_id = {$userId} and identifier = {$identifier}";
        return DB::select($query);
    }
}
