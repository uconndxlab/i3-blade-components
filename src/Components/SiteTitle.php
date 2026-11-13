<?php

namespace i3\i3BladeComponents\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SiteTitle extends Component
{
    private const SUPPORTED_FRAMEWORKS = [
        'bootstrap',
        'bulma',
        'tailwind',
    ];

    public string $framework;

    public string $containerClass;

    /**
     * Create a site title with optional links and framework-aware width containment.
     *
     * <x-i3::site-title title="My Site" subheader="University of Connecticut" />
     * <x-i3::site-title title="My Site" subheader="University of Connecticut" container-class="container" />
     */
    public function __construct(
        public string $title,
        public string $subheader,
        public ?string $titleUrl = null,
        public ?string $subheaderUrl = null,
        string $framework = 'bootstrap',
        ?string $containerClass = null,
    ) {
        $this->framework = in_array($framework, self::SUPPORTED_FRAMEWORKS, true)
            ? $framework
            : 'bootstrap';
        $this->containerClass = $containerClass ?? "site-title-container-{$this->framework}";
    }

    public function render(): View
    {
        return view('i3::components.site-title');
    }
}
