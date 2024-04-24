<span @class([
    'badge',
    \App\Enums\Is_featured::tryFrom($is_featured)->badge()
])>{{ \App\Enums\Is_featured::getDescription($is_featured) }}</span>