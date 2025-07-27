@if($car->status === 'china_border')
<div x-data="{ open: false }">
    <button @click="open = true" class="bg-blue-500 text-white px-3 py-1 rounded">Монгол хилд шилжүүлэх</button>

    <div x-show="open" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
        <div class="bg-white rounded-xl shadow-lg p-6 w-full max-w-md" @click.away="open = false">
            <h2 class="text-lg font-bold mb-4">Монголын татвар оруулах</h2>
            <form method="POST" action="{{ route('cars.status', $car) }}">
                @csrf
                <div class="mb-4">
                    <label class="block mb-1 font-medium">Татварын дүн (₮)</label>
                    <input type="number" name="customs_tax_mnt" step="0.01" class="w-full border rounded p-2" required>
                </div>
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Хадгалах ба шилжүүлэх</button>
            </form>
            <button @click="open = false" class="mt-4 text-sm text-gray-600 hover:underline">Хаах</button>
        </div>
    </div>
</div>
@endif
