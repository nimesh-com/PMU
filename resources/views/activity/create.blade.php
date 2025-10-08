@extends('layouts.app')

@section('content')

<div class="container py-5">
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <div class="card shadow border-0 rounded-4">
        <div class="card-header bg-gradient text-white text-center py-4 rounded-top-4" style="background: linear-gradient(90deg, #4e73df 0%, #1cc88a 100%);">
            <h4 class="mb-0 fw-bold text-uppercase">Budget Data Entry</h4>
        </div>

        <div class="card-body p-4">
            <form id="allocationForm" method="POST" action="{{ route('activity.store') }}">
                @csrf

                <!-- === Budget Code === -->
                <div class="mb-4">
                    <label class="form-label fw-bold">Budget Code</label>
                    <select class="form-select form-select-lg shadow-sm" id="budget_code" name="budget_code">
                        <option value="">Select Budget Code</option>
                        @foreach ($BudgetCodes as $budget)
                            <option value="{{ $budget->code }}">{{ $budget->code }} - {{ $budget->description }}</option>
                        @endforeach
                    </select>
                    @error('budget_code')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                </div>

                <!-- === Levels Section === -->
                <div class="row g-3 mb-4">
                    @php
                        $levels = [
                            ['id' => 'level1', 'data' => $Level01s, 'modal' => 'addLevel1Modal', 'label' => 'Level 1'],
                            ['id' => 'level2', 'data' => $Level02s, 'modal' => 'addLevel2Modal', 'label' => 'Level 2'],
                            ['id' => 'level3', 'data' => $Level03s, 'modal' => 'addLevel3Modal', 'label' => 'Level 3'],
                        ];
                    @endphp

                    @foreach($levels as $level)
                    <div class="col-md-4">
                        <label class="form-label fw-bold">{{ $level['label'] }}</label>
                        <div class="input-group shadow-sm rounded">
                            <select name="{{ $level['id'] }}" id="{{ $level['id'] }}" class="form-select">
                                <option value="" disabled selected>Select {{ $level['label'] }}</option>
                                @foreach($level['data'] as $l)
                                    <option value="{{ $l->name }}">{{ $l->name }}</option>
                                @endforeach
                            </select>
                            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                                data-bs-target="#{{ $level['modal'] }}">
                                <i class="bi bi-plus-circle"></i>
                            </button>
                        </div>
                        @error($level['id'])<div class="text-danger mt-1">{{ $message }}</div>@enderror
                    </div>
                    @endforeach
                </div>

                <!-- === Year & Division === -->
                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Year</label>
                        <select class="form-select shadow-sm" id="year" name="year">
                            <option value="">Select Year</option>
                            <option value="2025">2025</option>
                            <option value="2026">2026</option>
                            <option value="2027">2027</option>
                        </select>
                        @error('year')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Division</label>
                        <select class="form-select shadow-sm" id="division" name="division">
                            <option value="">Select Division</option>
                            <option value="Administration">Administration</option>
                            <option value="Agriculture">Agriculture</option>
                            <option value="Engineering">Engineering</option>
                            <option value="Finance">Finance</option>
                            <option value="Planning">Planning</option>
                            <option value="Livestock">Livestock</option>
                            <option value="Transport">Transport</option>
                        </select>
                    </div>
                </div>

                <!-- === Allocation & Quantity === -->
                <div class="row g-3 mb-4">
                    <div class="col-md-4">
                        <label class="form-label fw-bold">Total Allocation</label>
                        <input type="number" class="form-control shadow-sm" id="total_allocation" name="total_allocation"
                            placeholder="Enter total allocation">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold">Total Quantity</label>
                        <input type="number" class="form-control shadow-sm" id="allocation" name="allocation"
                            placeholder="Enter total quantity">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold">Unit</label>
                        <select class="form-select shadow-sm" id="unit" name="unit">
                            <option value="">Select Unit</option>
                            <option value="kg">Kg</option>
                            <option value="g">g</option>
                            <option value="Meter">Meter</option>
                            <option value="Km">Km</option>
                            <option value="litre">Litre</option>
                        </select>
                    </div>
                </div>

                <!-- === Monthly Allocation Table === -->
                <h5 class="mb-3 text-primary fw-bold">Monthly Allocation</h5>
                <div class="table-responsive shadow-sm rounded">
                    <table class="table table-bordered table-striped align-middle monthly-table mb-4">
                        <thead class="table-dark text-center">
                            <tr>
                                <th>Type</th>
                                @php
                                $months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
                                @endphp
                                @foreach($months as $month)
                                    <th>{{ $month }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <tr>
                                <td class="fw-bold text-start ps-3">Financial</td>
                                @foreach($months as $month)
                                    <td><input type="number" class="form-control financial-input monthly-input" name="financial_{{ strtolower($month) }}" placeholder="0" min="0"></td>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="fw-bold text-start ps-3">Physical</td>
                                @foreach($months as $month)
                                    <td><input type="number" class="form-control physical-input monthly-input" name="physical_{{ strtolower($month) }}" placeholder="0" min="0"></td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Alerts & Current Totals -->
                <div class="mb-3">
                    <div class="alert alert-danger d-none" id="allocationAlert"></div>
                    <div class="alert alert-danger d-none" id="quantityAlert"></div>
                    <div class="mt-2">
                        <strong>Current Financial Total: </strong><span id="currentTotal" class="text-success fw-bold">0</span>
                        <strong class="ms-4">Current Physical Total: </strong><span id="currentPhysicalTotal" class="text-success fw-bold">0</span>
                    </div>
                </div>

                <button type="submit" class="btn btn-success btn-lg w-100 shadow-sm py-2">Submit</button>
            </form>
        </div>
    </div>
</div>

<!-- === Modals for Adding Levels (unchanged) === -->
<!-- Level 1 Modal -->
<div class="modal fade" id="addLevel1Modal" tabindex="-1" aria-labelledby="addLevel1ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 shadow-sm">
            <div class="modal-header bg-primary text-white rounded-top-4">
                <h5 class="modal-title">Add New Level 1</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <input type="text" id="newLevel1Input" class="form-control" placeholder="Enter new Level 1 name">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="saveLevel1Btn">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Level 2 Modal -->
<div class="modal fade" id="addLevel2Modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 shadow-sm">
            <div class="modal-header bg-primary text-white rounded-top-4">
                <h5 class="modal-title">Add New Level 2</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <input type="text" id="newLevel2Input" class="form-control" placeholder="Enter new Level 2 name">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="saveLevel2Btn">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Level 3 Modal -->
<div class="modal fade" id="addLevel3Modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 shadow-sm">
            <div class="modal-header bg-primary text-white rounded-top-4">
                <h5 class="modal-title">Add New Level 3</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <input type="text" id="newLevel3Input" class="form-control" placeholder="Enter new Level 3 name">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="saveLevel3Btn">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- === JS for Levels and Allocation (unchanged) === -->
<script>
document.addEventListener("DOMContentLoaded", () => {
    const addLevel = (btnId, inputId, selectId, modalId) => {
        document.getElementById(btnId).addEventListener('click', () => {
            const inputValue = document.getElementById(inputId).value.trim();
            if(inputValue !== "") {
                const select = document.getElementById(selectId);
                const option = document.createElement('option');
                option.value = inputValue;
                option.textContent = inputValue;
                select.appendChild(option);
                select.value = inputValue;
                document.getElementById(inputId).value = "";
                const modal = bootstrap.Modal.getInstance(document.getElementById(modalId));
                modal.hide();
            }
        });
    };

    addLevel("saveLevel1Btn", "newLevel1Input", "level1", "addLevel1Modal");
    addLevel("saveLevel2Btn", "newLevel2Input", "level2", "addLevel2Modal");
    addLevel("saveLevel3Btn", "newLevel3Input", "level3", "addLevel3Modal");

    const totalAllocationField = document.getElementById("total_allocation");
    const financialInputs = document.querySelectorAll(".financial-input");
    const alertBox = document.getElementById("allocationAlert");
    const currentTotal = document.getElementById("currentTotal");

    const totalQuantityField = document.getElementById("allocation");
    const physicalInputs = document.querySelectorAll(".physical-input");
    const quantityAlert = document.getElementById("quantityAlert");
    const currentPhysicalTotal = document.getElementById("currentPhysicalTotal");

    function checkAllocation() {
        let totalAllocation = parseFloat(totalAllocationField.value) || 0;
        let sum = 0;
        financialInputs.forEach(input => sum += parseFloat(input.value) || 0);
        currentTotal.textContent = sum;

        if(totalAllocation > 0 && sum > totalAllocation) {
            alertBox.textContent = `⚠️ Exceeded total allocation! Remaining: ${Math.max(0, totalAllocation - sum)}`;
            alertBox.classList.remove("d-none");
        } else {
            alertBox.classList.add("d-none");
        }
    }

    function checkPhysical() {
        let totalQuantity = parseFloat(totalQuantityField.value) || 0;
        let sum = 0;
        physicalInputs.forEach(input => sum += parseFloat(input.value) || 0);
        currentPhysicalTotal.textContent = sum;

        if(totalQuantity > 0 && sum > totalQuantity) {
            quantityAlert.textContent = `⚠️ Exceeded total quantity! Remaining: ${Math.max(0, totalQuantity - sum)}`;
            quantityAlert.classList.remove("d-none");
        } else {
            quantityAlert.classList.add("d-none");
        }
    }

    financialInputs.forEach(input => input.addEventListener("input", checkAllocation));
    physicalInputs.forEach(input => input.addEventListener("input", checkPhysical));
});
</script>

@endsection
