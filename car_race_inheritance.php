<?php
// Base class: SportsCar
class SportsCar {
    // Encapsulated properties with access control
    private $brand;
    private $model;
    private $topSpeed;
    private $price;

    // Constructor to initialize attributes
    public function __construct($brand, $model, $topSpeed, $price) {
        $this->brand = $brand;
        $this->model = $model;
        $this->topSpeed = $topSpeed;
        $this->price = $price;
    }

    // Public method to display car details
    public function displayInfo() {
        echo "Brand: {$this->brand}\n";
        echo "Model: {$this->model}\n";
        echo "Top Speed: {$this->topSpeed} km/h\n";
        echo "Price: ₦{$this->price}\n";
    }

    // Protected method to calculate insurance cost (used by child class)
    protected function calculateInsurance() {
        return $this->price * 0.1; // 10% of the car price
    }

    // Method to get the top speed (for overriding demonstration)
    public function getTopSpeed() {
        return $this->topSpeed;
    }
}

// Child class: LuxuryCar (inherits from SportsCar)
class LuxuryCar extends SportsCar {
    private $interiorMaterial;
    private $hasMassageSeats;

    // Constructor for LuxuryCar, including new attributes
    public function __construct($brand, $model, $topSpeed, $price, $interiorMaterial, $hasMassageSeats) {
        // Use parent constructor to initialize inherited attributes
        parent::__construct($brand, $model, $topSpeed, $price);
        $this->interiorMaterial = $interiorMaterial;
        $this->hasMassageSeats = $hasMassageSeats;
    }

    // Override the getTopSpeed method to reflect luxury car limits
    public function getTopSpeed() {
        return parent::getTopSpeed() - 20; // Luxury cars prioritize comfort over speed
    }

    // Method to display luxury features
    public function displayLuxuryFeatures() {
        echo "Interior Material: {$this->interiorMaterial}\n";
        echo "Massage Seats: " . ($this->hasMassageSeats ? "Yes" : "No") . "\n";
        echo "Estimated Insurance Cost: ₦" . $this->calculateInsurance() . "\n";
    }
}

// Create instances and demonstrate functionality
echo "Luxury Car Details:\n";
$luxuryCar = new LuxuryCar("Mercedes-Benz", "S-Class", 300, 80000000, "Leather", true);
$luxuryCar->displayInfo();
$luxuryCar->displayLuxuryFeatures();
echo "Top Speed: " . $luxuryCar->getTopSpeed() . " km/h\n";
?>
