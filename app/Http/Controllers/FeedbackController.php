<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFeedbackRequestDto;
use App\Http\Responses\FetchFeedbacksResponseDto;
use App\Models\Feedback;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Spatie\LaravelData\PaginatedDataCollection;

class FeedbackController extends Controller
{
    public function store(StoreFeedbackRequestDto $request): JsonResponse
    {
        Feedback::query()->create($request->toArray());

        return response()->json(['message' => 'Feedback stored successfully']);
    }

    public function fetch(): PaginatedDataCollection
    {
        return FetchFeedbacksResponseDto::collect(Feedback::query()->paginate(10), PaginatedDataCollection::class);
    }
}
