<nav>
    <ul class="main-navigation">
        @foreach($menuItems as $itemName => $itemLink)
            <li>
                <a href="{{ $itemLink }}" class="<?= Request::url() == $itemLink ? 'link--active' : 'link'?>">
                    {{ $itemName }}
                </a>
            </li>
        @endforeach
    </ul>
</nav>
