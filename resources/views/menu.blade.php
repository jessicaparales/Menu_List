@extends('layouts.dashboard')
@section('content')
<div class="container">
<div class="card">
                            <div class="card-body">
                                <div class="row border-bottom g-3 pb-3">
                                    <div class="col-md-6">
                                        <h5 class="card-title" 
                                            style="font-family: 'Poppins', sans-serif;
                                                   font-weight: 400;
                                                   font-style: normal;">
                                            Menus
                                        </h5>
                                    </div>
                                    <div class="col-md-6">
                                    <input 
                                        class="form-control" 
                                        type="text" 
                                        id="menuSearch"
                                        placeholder="Search menu...">
                                    </div>
                                </div>
                                <div class="col-12 pt-3">
                                    <a href="/selectAll" class="btn btn-outline-primary btn-sm rounded-5">All</a>
                                    <a href="/selectFoods"  class="btn btn-outline-primary btn-sm rounded-5"><i class="fi fi-sr-cupcake"></i> Foods</a>
                                    <a href="/selectDrinks" class="btn btn-outline-info btn-sm rounded-5"><i class="fi fi-sr-mug-hot-alt me-1"></i>Drinks</a>
                                </div>
                                <div class="row mt-3 g-4">
                                    @foreach($menuList as $manageMenu)
                                    <div class="col-12 col-sm-6 col-lg-3 menu-card"
                                        data-name="{{ strtolower($manageMenu->menu_name) }}"
                                        data-description="{{ strtolower($manageMenu->menu_description) }}"
                                        data-category="{{ strtolower($manageMenu->menu_category) }}">
                                        <div class="card h-100" style="width: 15rem; cursor: pointer;" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#menuModal{{ $manageMenu->menu_id }}">
                                            @if($manageMenu->menu_picture == null)
                                                <img src="uploads/food.jfif" class="card-img-top" alt="food">
                                            @else
                                            <img src="uploads/{{$manageMenu->menu_picture}}" class="card-img-top" alt="food" width="150" height="200">
                                            @endif
                                            <div class="card-body d-flex flex-column" style="height: 150px; overflow: hidden;">
                                                <h5 class="card-title text-truncate" style="font-family: 'Poppins', sans-serif;
                                                font-weight: 500;
                                                font-style: normal;">{{ $manageMenu->menu_name }}</h5>
                                                <p class="card-text text-black-50 flex-grow-1" 
                                                style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                                    {{ $manageMenu->menu_description }}
                                                </p>
                                                <div class="d-flex justify-content-end mt-auto">  {{-- mt-auto pushes price to bottom --}}
                                                    <p class="card-text fw-bold border rounded-5 ps-3 pe-3 bg-warning">₱{{ $manageMenu->menu_price }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="menuModal{{ $manageMenu->menu_id }}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">

                                                <div class="modal-header border-0">
                                                    <h5 class="modal-title fw-bold" id="modalMenuName"></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>

                                                <div class="modal-body">
                                                    <img id="modalMenuPicture" src="uploads/{{ $manageMenu->menu_picture }}" class="img-fluid rounded mb-3 w-100" 
                                                        alt="Menu Picture" style="height: 250px; ">
                                                    <span id="modalMenuCategory" class="badge bg-info text-white mb-2">{{ $manageMenu->menu_category }}</span>
                                                    <p id="modalMenuDescription" class="text-muted">{{ $manageMenu->menu_description }}</p>
                                                </div>

                                                <div class="modal-footer border-0 d-flex justify-content-between align-items-center">
                                                    <span class="fw-bold fs-5 text-warning" id="modalMenuPrice">{{ $manageMenu->menu_price }}</span>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>

                                <div id="noResults" class="text-center py-5" style="display: none;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
@endsection

@section('script')
<script>
    function initMenuSearch() {
        const inp = document.getElementById('menuSearch');
        if(!inp) return;

        inp.addEventListener('input', e => {
            const term = e.target.value.trim().toLowerCase();
            term === '' ? clearSearch() : searchMenus(term);
        });

        inp.addEventListener('keydown', e => {
            if(e.key === 'Escape') { inp.value = ''; clearSearch(); }
        });
    }

    function searchMenus(term) {
        let count = 0;

        document.querySelectorAll('.menu-card').forEach(card => {
            const name = card.dataset.name || '';
            const desc = card.dataset.description || '';
            const cat  = card.dataset.category || '';

            if(name.includes(term) || desc.includes(term) || cat.includes(term)) {
                card.style.display = 'block';
                count++;
            } else {
                card.style.display = 'none';
            }
        });

        // Show no results message
        const noResults = document.getElementById('noResults');
        noResults.style.display = count === 0 ? 'block' : 'none';
        if(count === 0) {
            noResults.innerHTML = `<i class="bi bi-search fs-1 text-muted"></i>
                                   <p class="text-muted mt-2">No results found for "<strong>${term}</strong>"</p>`;
        }
    }

    function clearSearch() {
        document.querySelectorAll('.menu-card').forEach(card => {
            card.style.display = 'block';
        });
        document.getElementById('noResults').style.display = 'none';
    }

    document.addEventListener('DOMContentLoaded', initMenuSearch);
</script>
@endsection