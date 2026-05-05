<?php

namespace i3\i3BladeComponents\Components;

use Illuminate\View\Component;

class UConnBanner extends Component
{
    /**
     * Supported CSS frameworks and their metadata.
     * Each framework is a key that can be used as a class name suffix.
     */
    private const SUPPORTED_FRAMEWORKS = [
        'bootstrap',
        'bulma',
        'tailwind',
    ];

    /**
     * The CSS framework to use for responsive breakpoints.
     * Defaults to 'bootstrap' if invalid or unspecified.
     */
    public string $framework;

    /**
     * Create a new component instance.
     *
     * @param  string  $framework  The CSS framework to use ('bootstrap', 'bulma', or 'tailwind')
     */
    public function __construct(string $framework = 'bootstrap')
    {
        $this->framework = in_array($framework, self::SUPPORTED_FRAMEWORKS, true)
            ? $framework
            : 'bootstrap';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('i3::components.uconn-banner');
    }
}
