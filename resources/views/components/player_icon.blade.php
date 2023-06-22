<div>
    @if($player->position_id === 1)
    <img class="w-8 h-8 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-2" src="{{ asset('storage/players/' . "icon_FW.jpg") }}" loading="lazy" alt="team_logo">
    @elseif ($player->position_id === 2)
    <img class="w-8 h-8 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-2" src="{{ asset('storage/players/' . "icon_MF.jpg") }}" loading="lazy" alt="team_logo">
    @elseif ($player->position_id === 3)
    <img class="w-8 h-8 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-2" src="{{ asset('storage/players/' . "icon_DF.jpg") }}" loading="lazy" alt="team_logo">
    @elseif ($player->position_id === 4)
    <img class="w-8 h-8 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-2" src="{{ asset('storage/players/' . "icon_GK.jpg") }}" loading="lazy" alt="team_logo">
    @else
    <img src="{{ asset('images/no_image.jpg') }}">
    @endif
</div>