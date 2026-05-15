<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Models\Item;
use Illuminate\Http\JsonResponse;

class ItemController extends Controller
{
    /**
     * List all items for the authenticated user.
     */
    public function index(): JsonResponse
    {
        $items = auth()->user()->items()->latest()->get();

        return response()->json([
            'data' => $items,
        ]);
    }

    /**
     * Store a new item.
     */
    public function store(StoreItemRequest $request): JsonResponse
    {
        $item = auth()->user()->items()->create($request->validated());

        return response()->json([
            'message' => 'Item created successfully.',
            'data'    => $item,
        ], 201);
    }

    /**
     * Show a single item.
     */
    public function show(Item $item): JsonResponse
    {
        $this->authorizeItem($item);

        return response()->json([
            'data' => $item,
        ]);
    }

    /**
     * Update an item.
     */
    public function update(UpdateItemRequest $request, Item $item): JsonResponse
    {
        $this->authorizeItem($item);

        $item->update($request->validated());

        return response()->json([
            'message' => 'Item updated successfully.',
            'data'    => $item,
        ]);
    }

    /**
     * Delete an item.
     */
    public function destroy(Item $item): JsonResponse
    {
        $this->authorizeItem($item);

        $item->delete();

        return response()->json([
            'message' => 'Item deleted successfully.',
        ]);
    }

    /**
     * Ensure the item belongs to the authenticated user.
     */
    private function authorizeItem(Item $item): void
    {
        if ($item->user_id !== auth()->id()) {
            abort(403, 'Unauthorized.');
        }
    }
}
