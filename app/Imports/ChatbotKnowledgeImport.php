<?php

namespace App\Imports;

use App\Models\ChatbotKnowledge;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;

class ChatbotKnowledgeImport implements ToModel, WithHeadingRow, SkipsEmptyRows
{
    public int $importedCount = 0;
    private int $autoOrder = 1;

    public function model(array $row): ?ChatbotKnowledge
    {
        if (empty($row['title_ar']) || empty($row['content_ar'])) {
            return null;
        }

        $orderIndex = isset($row['order_index']) && $row['order_index'] !== ''
            ? (int) $row['order_index']
            : $this->autoOrder;

        $this->autoOrder++;
        $this->importedCount++;

        return new ChatbotKnowledge([
            'category'    => !empty($row['category']) ? trim($row['category']) : 'general',
            'title_ar'    => trim($row['title_ar']),
            'title_en'    => !empty($row['title_en']) ? trim($row['title_en']) : null,
            'content_ar'  => trim($row['content_ar']),
            'content_en'  => !empty($row['content_en']) ? trim($row['content_en']) : null,
            'tags'        => !empty($row['tags']) ? trim($row['tags']) : null,
            'order_index' => $orderIndex,
            'is_active'   => true,
        ]);
    }
}
