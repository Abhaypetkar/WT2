class Student {
    private $id;
    private $name;
    private $age;

    public function __construct($name, $age, $id = null) {
        $this->name = $name;
        $this->age = $age;
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getAge() {
        return $this->age;
    }

    public function save($pdo) {
        if ($this->id) {
            $stmt = $pdo->prepare("UPDATE students SET name = ?, age = ? WHERE id = ?");
            return $stmt->execute([$this->name, $this->age, $this->id]);
        } else {
            $stmt = $pdo->prepare("INSERT INTO students (name, age) VALUES (?, ?)");
            return $stmt->execute([$this->name, $this->age]);
        }
    }

    public function delete($pdo) {
        if ($this->id) {
            $stmt = $pdo->prepare("DELETE FROM students WHERE id = ?");
            return $stmt->execute([$this->id]);
        }
        return false;
    }

    public static function findAll($pdo) {
        $stmt = $pdo->query("SELECT * FROM students");
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Student');
    }

    public static function findById($pdo, $id) {
        $stmt = $pdo->prepare("SELECT * FROM students WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetchObject('Student');
    }
}