<div>
    <div class="collaborators-marquee-container">
        @if($collaborators->isNotEmpty())
            <div class="marquee-wrapper">
                <div class="marquee-inner">
                    <div class="marquee-content">
                        @foreach($collaborators as $collaborator)
                            <div class="collaborator-card">
                                <div class="collaborator-logo-wrapper">
                                    @if($collaborator->website_url)
                                        <a 
                                            href="{{ $collaborator->website_url }}" 
                                            target="_blank" 
                                            rel="noopener noreferrer"
                                            class="collaborator-link"
                                        >
                                            <img 
                                                src="{{ Storage::url($collaborator->logo) }}" 
                                                alt="{{ $collaborator->name }}"
                                                class="collaborator-logo"
                                                loading="lazy"
                                            >
                                            <div class="collaborator-overlay">
                                                <span>{{ $collaborator->name }}</span>
                                            </div>
                                        </a>
                                    @else
                                        <div class="collaborator-logo-static">
                                            <img 
                                                src="{{ Storage::url($collaborator->logo) }}" 
                                                alt="{{ $collaborator->name }}"
                                                class="collaborator-logo"
                                                loading="lazy"
                                            >
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="marquee-content" aria-hidden="true">
                        @foreach($collaborators as $collaborator)
                            <div class="collaborator-card">
                                <div class="collaborator-logo-wrapper">
                                    @if($collaborator->website_url)
                                        <a 
                                            href="{{ $collaborator->website_url }}" 
                                            target="_blank" 
                                            rel="noopener noreferrer"
                                            class="collaborator-link"
                                        >
                                            <img 
                                                src="{{ Storage::url($collaborator->logo) }}" 
                                                alt="{{ $collaborator->name }}"
                                                class="collaborator-logo"
                                                loading="lazy"
                                            >
                                            <div class="collaborator-overlay">
                                                <span>{{ $collaborator->name }}</span>
                                            </div>
                                        </a>
                                    @else
                                        <div class="collaborator-logo-static">
                                            <img 
                                                src="{{ Storage::url($collaborator->logo) }}" 
                                                alt="{{ $collaborator->name }}"
                                                class="collaborator-logo"
                                                loading="lazy"
                                            >
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>


