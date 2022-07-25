<x-layout>
    <x-listingFull :logo='$listing->logo' :id='$listing->id' :desc='$listing->desc' :title='$listing->title' :tags='explode("," , $listing->tags)' :company='$listing->company' :location='$listing->location'></x-listingFull>
</x-layout>
