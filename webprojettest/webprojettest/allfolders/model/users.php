<?PHP
class Utilisateur
{
    private ?int $idUsers     = null;
    private ?string $nameUsers = null;
    private ?string $lastnameUsers = null;
    private ?string $address = null;
    private ?string $Login = null;
    private ?string $Cin = null;
    private ?string $Password = null;


    function __construct(string $nameUsers, string $lastnameUsers, string $address, string $Login, string $Cin, string $Password)
    {

        $this->nameUsers = $nameUsers;
        $this->lastnameUsers = $lastnameUsers;
        $this->address = $address;
        $this->Login = $Login;
        $this->Cin = $Cin;
        $this->Password = $Password;
    }

    function getId(): int
    {
        return $this->idUsers;
    }
    function getNom(): string
    {
        return $this->nameUsers;
    }
    function getPrenom(): string
    {
        return $this->lastnameUsers;
    }
    function getLogin(): string
    {
        return $this->Login;
    }
    function getCin(): string
    {
        return $this->Cin;
    }
    function getAdress(): string
    {
        return $this->address;
    }
    function getPassword(): string
    {
        return $this->Password;
    }

    function setNom(string $nameUsers): void
    {
        $this->nameUsers = $nameUsers;
    }
    function setPrenom(string $lastnameUsers): void
    {
        $this->lastnameUsers;
    }
    function setLogin(string $Login): void
    {
        $this->Login = $Login;
    }
    function setCin(string $Cin): void
    {
        $this->Cin = $Cin;
    }
    function setAdress(string $address): void
    {
        $this->address = $address;
    }
    function setPassword(string $Password): void
    {
        $this->Password = $Password;
    }
}
