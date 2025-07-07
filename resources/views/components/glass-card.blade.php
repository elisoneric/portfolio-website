<div {{ $attributes->merge(['class' => '
    bg-white/10 
    backdrop-blur-md 
    border border-white/20 
    rounded-xl 
    p-6
    shadow-lg
    transition-all
    duration-300
    hover:scale-[1.02]
    hover:shadow-xl
    hover:border-primary
']) }}>
    {{ $slot }}
</div>