<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ProductCard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    
    public $image;
    public $product;
    public $descripcion;
    public $etiquetas;
    public $price;
    public $location;
    public $negocio;
    public $oferta;



    public function __construct($image, $product, $descripcion, $etiquetas, $price, $location, $negocio, $oferta)
    {
        $this->image = $image;
        $this->product = $product;
        $this->descripcion = $descripcion;
        $this->etiquetas = $etiquetas;
        $this->price = $price;
        $this->location = $location;
        $this->negocio = $negocio;
        $this->oferta = $oferta;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.product-card');
    }
}
