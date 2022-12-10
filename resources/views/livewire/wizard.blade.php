<div>
    @if(!empty($successMessage))
    <div class="alert alert-success">
        {{ $successMessage }}
    </div>
    @endif
    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
                <a href="#step1" type="button" class="btn step-status {{ $currentStep != 1 ? 'btn-default' : 'btn-primary' }}">1</a>
                <p>First Step</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step2" type="button" class="btn step-status {{ $currentStep != 2 ? 'btn-default' : 'btn-primary' }}">2</a>
                <p>Seconde Step</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step3" type="button" class="btn step-status {{ $currentStep != 3 ? 'btn-default' : 'btn-primary' }}" disabled="disabled">3</a>
                <p>Final Step</p>
            </div>
        </div>
    </div>
    <div class="setup-content {{ $currentStep != 1 ? 'displayNone' : '' }}" id="step1">
        <h3>First Step</h3>
        <div class="form-group">
            <label for="title">Barcode:</label>
            <input type="text" wire:model="barcode" class="form-control" autocomplete="off">
            @error('barcode') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="description">Title:</label>
            <input type="text" wire:model="title" class="form-control" autocomplete="off"/>
            @error('title') <span class="error">{{ $message }}</span> @enderror
        </div>
        <button class="btn btn-primary" wire:click="firstStepSubmit" type="button">Next</button>
    </div>
    <div class="setup-content {{ $currentStep != 2 ? 'displayNone' : '' }}" id="step2">
        <h3>Seconde Step</h3>
        <div class="form-group">
            <label for="description">Qty</label>
            <input type="text" wire:model="qty" class="form-control"  autocomplete="off"/>
            @error('qty') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="description">amount</label>
            <input type="text" wire:model="amount" class="form-control"  autocomplete="off"/>
            @error('amount') <span class="error">{{ $message }}</span> @enderror
        </div>
        <button class="btn btn-primary" type="button" wire:click="secondStepSubmit">Next</button>
        <button class="btn btn-danger" type="button" wire:click="back(1)">Back</button>
    </div>
    <div class="setup-content {{ $currentStep != 3 ? 'displayNone' : '' }}" id="step3">
        <h3>Final Step</h3>
        <table class="table">
            <tr>
                <td>Barcode:</td>
                <td><strong>{{$barcode}}</strong></td>
            </tr>
            <tr>
                <td>Title:</td>
                <td><strong>{{$title}}</strong></td>
            </tr>
            <tr>
                <td>Qty:</td>
                <td><strong>{{$qty}}</strong></td>
            </tr>
            <tr>
                <td>Amount:</td>
                <td><strong>{{$amount}}</strong></td>
            </tr>
        </table>
        <button class="btn btn-success" wire:click="submitForm" type="button">Finish!</button>
        <button class="btn btn-danger" type="button" wire:click="back(2)">Back</button>
    </div>
</div>

