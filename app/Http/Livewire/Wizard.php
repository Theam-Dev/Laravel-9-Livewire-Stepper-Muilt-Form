<?php
  
namespace App\Http\Livewire;
  
use Livewire\Component;
use App\Models\Product;
  
class Wizard extends Component
{
    public $currentStep = 1;
    public $barcode, $title, $qty, $amount;
    public $successMessage = '';
    public function render()
    {
        return view('livewire.wizard');
    }
    public function firstStepSubmit()
    {
        $validatedData = $this->validate([
            'barcode' => 'required',
            'title' => 'required'
        ]);
        $this->currentStep = 2;
    }
    public function secondStepSubmit()
    {
        $validatedData = $this->validate([
            'qty' => 'required',
            'amount' => 'required',
        ]);
        $this->currentStep = 3;
    }
    public function submitForm()
    {
        Product::create([
            'barcode' => $this->barcode,
            'title' => $this->title,
            'qty' => $this->qty,
            'amount' => $this->amount
        ]);
        $this->successMessage = 'Product Created';
        $this->clearForm();
        $this->currentStep = 1;
    }
    public function back($step)
    {
        $this->currentStep = $step;    
    }
    public function clearForm()
    {
        $this->barcode = '';
        $this->title = '';
        $this->qty = '';
        $this->amount = '';
    }
}