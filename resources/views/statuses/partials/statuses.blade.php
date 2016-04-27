@forelse($statuses as $status)
    @include('statuses.partials.status')
@empty
    <p>This user has't yet posted a status.</p>
@endforelse
