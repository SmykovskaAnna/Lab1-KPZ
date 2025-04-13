# 🧾 Принципи програмування, реалізовані в проєктНижче наведено опис реалізованих принципів:

---

## **DRY (Don't Repeat Yourself)** – "Не повторюй себе"

> **Essence:** Уникнення дублювання логіки.

**Where and how it is followed:**

- Створено окремий клас `Money.php` для роботи з грошима.
- Усі операції з грошима виконуються через метод `setMoney()`.

📄 [`Money.php`](./Money.php#L9-L19)

---

## **KISS (Keep It Simple, Stupid)** – "Роби простіше"

> **Essence:** Зрозумілий і простий код.

**Where and how it is followed:**

- Кожен клас має чітку відповідальність:
    - `Product.php` — робота з товарами.
    - `Warehouse.php` — управління складом.

📄 [`Product.php`](./Product.php#L5-L26)
📄 [`Warehouse.php`](./Warehouse.php#L5-L15)

---

## **SOLID-принципи**

### S – **Single Responsibility Principle** – "Єдина відповідальність"

> **Essence:** Кожен клас відповідає лише за одну задачу.

- [`Money.php`](./Money.php) — робота з грошима.
- [`Product.php`](./Product.php) — робота з товарами.
- [`Warehouse.php`](./Warehouse.php) — управління складом.
- [`Reporting.php`](./Reporting.php#L5-L20) — генерація звітів.

---

### O – **Open/Closed Principle** – "Відкритий для розширення, закритий для змін"

> **Essence:** Клас можна розширити без зміни існуючого коду.

- Можна створити `DiscountedProduct`, який наслідує `Product`.
- `Warehouse` дозволяє додавання нових методів без зміни старих.

📄 [`Warehouse.php`](./Warehouse.php#L5-L15)

---

### L – **Liskov Substitution Principle** – "Принцип підстановки Лісков"

> **Essence:** Підкласи можуть замінити батьківські класи без зміни поведінки системи.

- `Product` може бути замінений на `DiscountedProduct` — логіка складу не зміниться.

📌 *Гіпотетичний приклад з `DiscountedProduct`*

---

### I – **Interface Segregation Principle** – "Принцип поділу інтерфейсу"

> **Essence:** Краще кілька маленьких інтерфейсів, ніж один великий.

- Функціонал розділено по класах [`Money.php`](./Money.php), [`Product.php`](./Product.php#L5-L26), [`Warehouse.php`](./Warehouse.php)`, замість одного великого класу типу `Database`.

---

### D – **Dependency Inversion Principle** – "Інверсія залежностей"

> **Essence:** Залежність від абстракцій, а не конкретних класів.

- `Product` залежить від класу `Money`, використовуючи методи (`setMoney()`, `__toString()`), а не напряму працює з даними, що дозволяє заміняти реалізації грошей в майбутньому.

📄 [`Product.php`](./Product.php#L13-L20)

---

## **YAGNI (You Ain’t Gonna Need It)** – "Тобі це не знадобиться"

> **Essence:** Не реалізовуй функціонал наперед.

**Where and how it is followed:**

- У класі `Money.php` відсутній метод `convertToDollars()`, бо така логіка поки що не потрібна для даного проекту.

📄 [`Money.php`](./Money.php)

---

## **Composition Over Inheritance** – "Композиція замість наслідування"

> **Essence:** Краще створювати зв’язки між об’єктами, ніж глибоко наслідувати.

**Where and how it is followed:**

- `Product` містить об'єкт `Money` як властивість `$price`, а не наслідує його, що дозволяє легше змінювати та розширювати код у майбутньому.

📄 [`Product.php`](./Product.php#L7)

---

## **Program to Interfaces, Not Implementations** – "Програмуй на рівні інтерфейсів"

> **Essence:** Програмування на рівні абстракцій (інтерфейсів), а не на рівні конкретних реалізацій.

**Where and how it is followed:**

- Наприклад, клас `Warehouse` працює з абстракціями, такими як `Product`, а не конкретними реалізаціями, що дозволяє змінювати типи продуктів або грошей без зміни логіки складу.

📄 [`Warehouse.php`](./Warehouse.php#L5-L15)

---

## **Fail Fast** – "Провалюйся швидко"

> **Essence:** Некоректні дані мають одразу викликати помилку, щоб виявити проблеми на ранніх етапах.

**Where and how it is followed:**

- У методі `setMoney()` класу `Money` перевіряється, що кількість копійок не більша за 99, що дозволяє швидко виявити помилки у введених даних.

📄 [`Money.php`](./Money.php#L13-L17)

---

## ✅ **Висновок**

> Цей код відповідає принципам  **DRY**, **KISS**, **SOLID**,**YAGNI**, **Composition Over Inheritance**, **Program to Interfaces not Implementations**, **Fail Fast**.  
Це робить його **гнучким**, **розширюваним** та **зручним у підтримці**.