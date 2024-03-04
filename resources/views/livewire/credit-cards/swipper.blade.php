<div x-data="{
    init() {
            ActiveId = '';
            this.$watch('ActiveId', (value) => {
                if (value !== '') {
                    // this.$wire.set('active_credit_card_id', ActiveId)
                }
            });
        },
        initSwiper: function() {
            const AlpineComponent = this;
            const swiper = new Swiper(this.$wire.$el.querySelector('.swiper'), {
                effect: 'cards',
            });
            swiper.on('slideChange', function() {
                let activeSlide = swiper.slides[swiper.realIndex];
                let activeId = activeSlide.getAttribute('data-credit-card-id');
                AlpineComponent.ActiveId = activeId;
            });
        }
}" x-init="initSwiper()">
    <span x-text="ActiveId"></span>
    <!-- Slider main container -->
    <div class="w-3/4 swiper" x-ref="swiper">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            @foreach ($credit_cards as $credit_card)
                <div wire:key="{{ $credit_card->id }}" @class([
                    'shadow-lg rounded-2xl swiper-slide',
                    'swiper-slide-active' => $active_credit_card_id === $credit_card->id,
                ])
                    data-credit-card-id="{{ $credit_card->id }}">
                    @if ($credit_card->cover_image)
                        <div class="relative w-80 h-44">
                            <img src="{{ Storage::url($credit_card->cover_image) }}" />
                            <p class="absolute text-white bottom-2 start-2">{{ $credit_card->name }}</p>
                            <input type="checkbox" wire:model="active_credit_card_id" value="{{ $credit_card->id }}" />
                        </div>
                    @else
                        <div class="relative flex items-center justify-center bg-slate-100 w-80 h-44">
                            <img src="{{ Storage::url($credit_card->icon) }}" class="w-36" />
                            <p class="absolute text-black bottom-2 start-2">{{ $credit_card->name }}</p>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</div>

@assets
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
@endassets
