<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 180, unique: true)]
    private $email;

    #[ORM\Column(type: 'string', length: 180)]
    private $nom;

    #[ORM\Column(type: 'string', length: 180)]
    private $prenom;

    #[ORM\Column(type: 'json')]
    private $roles = [];

    #[ORM\Column(type: 'string')]
    private $password;

    #[ORM\ManyToMany(targetEntity: Categorie::class, inversedBy: 'users')]
    private $categorie;

    #[ORM\ManyToMany(targetEntity: Couleur::class, inversedBy: 'longeur')]
    private $couleur;

    #[ORM\ManyToMany(targetEntity: Longueur::class, inversedBy: 'users')]
    private $longueur;

    #[ORM\ManyToMany(targetEntity: Manche::class, inversedBy: 'users')]
    private $manche;

    #[ORM\ManyToMany(targetEntity: Matiere::class, inversedBy: 'users')]
    private $matiere;

    #[ORM\ManyToMany(targetEntity: Produit::class, inversedBy: 'users')]
    private $produit;

    #[ORM\ManyToMany(targetEntity: Saison::class, inversedBy: 'users')]
    private $saison;

    #[ORM\ManyToMany(targetEntity: Specificite::class, inversedBy: 'users')]
    private $specificite;

    #[ORM\ManyToMany(targetEntity: Type::class, inversedBy: 'users')]
    private $type;

    public function __construct()
    {
        $this->categorie = new ArrayCollection();
        $this->couleur = new ArrayCollection();
        $this->longueur = new ArrayCollection();
        $this->manche = new ArrayCollection();
        $this->matiere = new ArrayCollection();
        $this->produit = new ArrayCollection();
        $this->saison = new ArrayCollection();
        $this->specificite = new ArrayCollection();
        $this->type = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    /**
     * Get the value of nom
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of prenom
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * @return Collection<int, Categorie>
     */
    public function getCategorie(): Collection
    {
        return $this->categorie;
    }

    public function addCategorie(Categorie $categorie): self
    {
        if (!$this->categorie->contains($categorie)) {
            $this->categorie[] = $categorie;
        }

        return $this;
    }

    public function removeCategorie(Categorie $categorie): self
    {
        $this->categorie->removeElement($categorie);

        return $this;
    }

    /**
     * @return Collection<int, Couleur>
     */
    public function getCouleur(): Collection
    {
        return $this->couleur;
    }

    public function addCouleur(Couleur $couleur): self
    {
        if (!$this->couleur->contains($couleur)) {
            $this->couleur[] = $couleur;
        }

        return $this;
    }

    public function removeCouleur(Couleur $couleur): self
    {
        $this->couleur->removeElement($couleur);

        return $this;
    }

    /**
     * @return Collection<int, Longueur>
     */
    public function getLongueur(): Collection
    {
        return $this->longueur;
    }

    public function addLongueur(Longueur $longueur): self
    {
        if (!$this->longueur->contains($longueur)) {
            $this->longueur[] = $longueur;
        }

        return $this;
    }

    public function removeLongueur(Longueur $longueur): self
    {
        $this->longueur->removeElement($longueur);

        return $this;
    }

    /**
     * @return Collection<int, Manche>
     */
    public function getManche(): Collection
    {
        return $this->manche;
    }

    public function addManche(Manche $manche): self
    {
        if (!$this->manche->contains($manche)) {
            $this->manche[] = $manche;
        }

        return $this;
    }

    public function removeManche(Manche $manche): self
    {
        $this->manche->removeElement($manche);

        return $this;
    }

    /**
     * @return Collection<int, Matiere>
     */
    public function getMatiere(): Collection
    {
        return $this->matiere;
    }

    public function addMatiere(Matiere $matiere): self
    {
        if (!$this->matiere->contains($matiere)) {
            $this->matiere[] = $matiere;
        }

        return $this;
    }

    public function removeMatiere(Matiere $matiere): self
    {
        $this->matiere->removeElement($matiere);

        return $this;
    }

    /**
     * @return Collection<int, Produit>
     */
    public function getProduit(): Collection
    {
        return $this->produit;
    }

    public function addProduit(Produit $produit): self
    {
        if (!$this->produit->contains($produit)) {
            $this->produit[] = $produit;
        }

        return $this;
    }

    public function removeProduit(Produit $produit): self
    {
        $this->produit->removeElement($produit);

        return $this;
    }

    /**
     * @return Collection<int, Saison>
     */
    public function getSaison(): Collection
    {
        return $this->saison;
    }

    public function addSaison(Saison $saison): self
    {
        if (!$this->saison->contains($saison)) {
            $this->saison[] = $saison;
        }

        return $this;
    }

    public function removeSaison(Saison $saison): self
    {
        $this->saison->removeElement($saison);

        return $this;
    }

    /**
     * @return Collection<int, Specificite>
     */
    public function getSpecificite(): Collection
    {
        return $this->specificite;
    }

    public function addSpecificite(Specificite $specificite): self
    {
        if (!$this->specificite->contains($specificite)) {
            $this->specificite[] = $specificite;
        }

        return $this;
    }

    public function removeSpecificite(Specificite $specificite): self
    {
        $this->specificite->removeElement($specificite);

        return $this;
    }

    /**
     * @return Collection<int, Type>
     */
    public function getType(): Collection
    {
        return $this->type;
    }

    public function addType(Type $type): self
    {
        if (!$this->type->contains($type)) {
            $this->type[] = $type;
        }

        return $this;
    }

    public function removeType(Type $type): self
    {
        $this->type->removeElement($type);

        return $this;
    }
}
