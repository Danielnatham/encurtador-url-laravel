<div>
    <div class="flex flex-col mb-6">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="shadow overflow-hiddem border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Slug
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Url
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Criado em
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Expira em
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($links as $link)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $link->slug }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-gray-500">{{ Str::limit($link->url, 40) }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ Carbon\Carbon::parse($link->created_at)->toFormattedDateString() }}</div>
                                    <div class="text-sm text-gray-500">{{ Carbon\Carbon::parse($link->created_at)->diffForHumans() }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ Carbon\Carbon::parse($link->expires_at)->toFormattedDateString() }}</div>
                                    <div class="text-sm text-gray-500">{{ Carbon\Carbon::parse($link->expires_at)->diffForHumans() }}</div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {!! $links->links() !!}

    @if ($links->isEmpty())
        <p class="text-gray-800 font-bold text-2xl text-center my-10">No links found!</p>
    @endif 


