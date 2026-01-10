<div class="sidebar-menu bg-dark fixed-top">
    <div class="sidebar">
      <ul class="list-group sidebar-list-menu">
        <li class="list-group-item"><i class="fa-solid fa-house me-2"></i><a class="text-white text-decoration-none" href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="list-group-item">
          <p class="m-0">
            <a class="accordion-button collapsed text-white bg-transparent p-0" data-bs-toggle="collapse" href="#collapseOne" role="button" aria-expanded="false" aria-controls="collapseOne">
              <i class="fa-solid fa-cart-shopping me-2"></i>
              Categories & Products
            </a>
          </p>
          <div class="collapse" id="collapseOne">
            <div class="card card-body">
              <ul class="list-group dropdown-dropdown-list">
                <li class="list-group-item"><a class="text-white text-decoration-none" href="{{ route('admin.category.index') }}">Category</a></li>
                <li class="list-group-item">A second item</li>
                <li class="list-group-item">A third item</li>
                <li class="list-group-item">A fourth item</li>
                <li class="list-group-item border-bottom-0">And a fifth one</li>
              </ul>
            </div>
          </div>
        </li>
        <li class="list-group-item">
          <p class="m-0">
            <a class="accordion-button collapsed text-white bg-transparent p-0" data-bs-toggle="collapse" href="#collapseTow" role="button" aria-expanded="false" aria-controls="collapseTow">
              <i class="fa-solid fa-cart-shopping me-2"></i>Orders
            </a>
          </p>
          <div class="collapse" id="collapseTow">
            <div class="card card-body">
              <ul class="list-group dropdown-dropdown-list">
                <li class="list-group-item">An item</li>
                <li class="list-group-item">A second item</li>
                <li class="list-group-item">A third item</li>
                <li class="list-group-item">A fourth item</li>
                <li class="list-group-item border-bottom-0">And a fifth one</li>
              </ul>
            </div>
          </div>
        </li>
        <li class="list-group-item">
          <p class="m-0">
            <a class="accordion-button collapsed text-white bg-transparent p-0" data-bs-toggle="collapse" href="#collapseThree" role="button" aria-expanded="false" aria-controls="collapseThree">
              <i class="fa-solid fa-cart-shopping me-2"></i>Orders
            </a>
          </p>
          <div class="collapse" id="collapseThree">
            <div class="card card-body">
              <ul class="list-group dropdown-dropdown-list">
                <li class="list-group-item">An item</li>
                <li class="list-group-item">A second item</li>
                <li class="list-group-item">A third item</li>
                <li class="list-group-item">A fourth item</li>
                <li class="list-group-item border-bottom-0">And a fifth one</li>
              </ul>
            </div>
          </div>
        </li>
        <li class="list-group-item"><i class="fa-solid fa-user-group me-2"></i>Customer</li>
        <li class="list-group-item"><i class="fa-solid fa-chart-line me-2"></i>Raports</li>
        <li class="list-group-item"><i class="fa-solid fa-file me-2"></i>Integrations</li>
      </ul>   
    </div>
</div>