<?php
// require 'Personnage.php';

class Archer extends Personnage
{
    private $type;

    public function type()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function frapper(Personnage $persoCible)
    {
        if($persoCible->id() == $this->id())
        {
        return self::CEST_MOI;
        }
        $persoFrappeurForce = $this->strength();
        $persoFrappeurType = $this->type();

        $this->experience += 25;
        // On indique au personnage qu'il doit recevoir des dégâts.

        // Puis on retourne la valeur renvoyée par la méthode : self::PERSONNAGE_TUE ou self::PERSONNAGE_FRAPPE
        return $persoCible->recevoirDegats($persoFrappeurForce, $persoFrappeurType);
    }

    public function recevoirDegats($persoFrappeurForce, $persoFrappeurType)
  {
    if($persoFrappeurType == "magicien")
    {
        $this->degats += (5 + $persoFrappeurForce)*2 ;
    }
    else
    {
        $this->degats += 5 + $persoFrappeurForce ;
    }
    
    // Si on a 100 de dégâts ou plus, on dit que le personnage a été tué.
    if($this->degats >= 100)
    {
      return self::PERSONNAGE_TUE;
    }
    
    // Sinon, on se contente de dire que le personnage a bien été frappé.
    return self::PERSONNAGE_FRAPPE;
  }
}