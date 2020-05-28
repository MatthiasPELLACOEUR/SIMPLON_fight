<?php

abstract class Personnage
{
  protected $degats,
          $id,
          $nom,
          $niveau,
          $experience,
          $strength;
  
  const CEST_MOI = 1; // Constante renvoyée par la méthode `frapper` si on se frappe soi-même.
  const PERSONNAGE_TUE = 2; // Constante renvoyée par la méthode `frapper` si on a tué le personnage en le frappant.
  const PERSONNAGE_FRAPPE = 3; // Constante renvoyée par la méthode `frapper` si on a bien frappé le personnage.
  
  
  public function __construct(array $donnees)
  {
    $this->hydrate($donnees);
  }
  
  abstract public function frapper(Personnage $persoCible);
  
  public function hydrate(array $donnees)
  {
    foreach ($donnees as $key => $value)
    {
      $method = 'set'.ucfirst($key);
      
      if(method_exists($this, $method))
      {
        $this->$method($value);
      }
    }
  }
  
  abstract public function recevoirDegats($persoFrappeurForce, $persoFrappeurType);
  
  
  // GETTERS //
  public function degats()
  {
    return $this->degats;
  }
  
  public function id()
  {
    return $this->id;
  }
  
  public function nom()
  {
    return $this->nom;
  }
  public function niveau()
  {
    return $this->niveau;
  }
  public function experience()
  {
    return $this->experience;
  }
  public function strength()
  {
    return $this->strength;
  }
  
  // SETTERS
  
  public function setDegats($degats)
  {
    $degats = (int) $degats;
    
    if($degats >= 0 && $degats <= 100)
    {
      $this->degats = $degats;
    }
  }
  
  public function setId($id)
  {
    $id = (int) $id;
    
    if($id > 0)
    {
      $this->id = $id;
    }
  }
  
  public function setNom($nom)
  {
    if(is_string($nom))
    {
      $this->nom = $nom;
    }
  }

  public function setNiveau($niveau)
  {
      $this->niveau += $niveau;
  }

  public function setExperience($experience)
  {
      $this->experience = $experience;
  }

  public function setStrength($strength)
  {
      
      $this->strength = $strength;
    
  }

  public function nomValide()
  {
      if($this->nom != "") {
          return true;
      }
  }
  
}
