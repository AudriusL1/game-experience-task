<?php

namespace App\Http\Controllers;

use App\Http\Requests\Feedback\FetchFeedbacksRequestDto;
use App\Http\Requests\Feedback\StoreFeedbackRequestDto;
use App\Http\Requests\Feedback\UpdateFeedbackStateDto;
use App\Http\Responses\Feedback\FetchFeedbacksResponseDto;
use App\Models\Feedback;
use Illuminate\Http\JsonResponse;
use Spatie\LaravelData\PaginatedDataCollection;

class FeedbackController extends Controller
{
    public function store(StoreFeedbackRequestDto $request): JsonResponse
    {
        try {
            Feedback::query()->create($request->toArray());

            return response()->json(['message' => 'Feedback stored successfully'], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to store feedback'], 500);
        }
    }

    public function fetchFeedbacks(FetchFeedbacksRequestDto $request): PaginatedDataCollection
    {
        return FetchFeedbacksResponseDto::collect(
            Feedback::query()
                ->whereCategory($request->category)
                ->wherePlatform($request->platform)
                ->whereState($request->state)
                ->paginate(10),
            PaginatedDataCollection::class
        );
    }

    public function fetchSingleFeedback(Feedback $feedback): FetchFeedbacksResponseDto|JsonResponse
    {
        if (!$feedback->exists) {
            return response()->json(['error' => 'Feedback not found'], 404);
        }

        return FetchFeedbacksResponseDto::fromModel($feedback);
    }

    public function updateFeedbackStatus(Feedback $feedback, UpdateFeedbackStateDto $request): FetchFeedbacksResponseDto|JsonResponse
    {
        if (!$feedback->exists) {
            return response()->json(['error' => 'Feedback not found'], 404);
        }

        $feedback->update(['state' => $request->status]);

        return FetchFeedbacksResponseDto::fromModel($feedback);
    }
}
