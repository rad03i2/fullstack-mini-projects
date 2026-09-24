# Fullstack Mini Projects — TaskBoard Mini

A compact, production-minded PHP 8.2 + SQLite task manager that demonstrates a complete server-rendered CRUD workflow without a framework.

## English

### Overview & purpose
This repository turns a small full-stack exercise into a useful local task board. Data is persisted in SQLite, user-controlled output is escaped, writes are protected with CSRF tokens, and SQL uses prepared statements.

### Features
- Create, list, filter, update, and delete tasks.
- To do / In progress / Done workflow and Low / Medium / High priorities.
- SQLite persistence with automatic schema initialization.
- Responsive UI, empty/error states, delete confirmation, and persistent light/dark preference.
- Unicode and Arabic text support.
- CSRF protection, prepared SQL, output escaping, constrained status/priority values, and length limits.
- Dependency-free application code and a small automated test suite.

### Preview
Run the app and open `http://localhost:8000`. The dashboard shows status totals, a task form, filters, and responsive task cards. Screenshots are intentionally not committed so repository images never drift from the current UI.

### Requirements & installation
- PHP 8.2+ with `pdo_sqlite` and `mbstring`.

```bash
git clone https://github.com/rad03i2/fullstack-mini-projects.git
cd fullstack-mini-projects
php -S localhost:8000 -t task-board
```

The writable `data/` directory/database is created automatically on first request.

### Usage & configuration
Add a title, optional description, status, and priority. Use the filters to narrow the board and each card's controls to change status or delete it. No environment variables or secrets are required. For production deployment, serve `task-board/` as the document root over HTTPS and keep the generated `data/` directory outside public backups when its contents are sensitive.

### Project structure
```text
task-board/       Web application, styles and browser behavior
tests/run.php     Functional database/security assertions
.github/workflows/ci.yml  PHP syntax + test CI
data/              Runtime SQLite data (gitignored)
```

### Testing
```bash
php tests/run.php
find task-board tests -name '*.php' -print0 | xargs -0 -n1 php -l
```
GitHub Actions performs the same validation on pushes and pull requests.

### Limitations
This is intentionally a small single-user/local task board: it has no accounts, multi-user authorization, real-time collaboration, attachments, notifications, or remote sync. SQLite is appropriate for modest workloads, not high-concurrency deployments.

### Security & privacy
Task content stays in the local SQLite database. The app has no analytics, telemetry, external API calls, or credentials. CSRF, escaping, prepared statements, and server-side constraints reduce common risks, but an internet-facing deployment should additionally use HTTPS, hardened PHP/server settings, backups, and access control.

### Optional roadmap
Optional future additions include task editing beyond status, due dates, search, and authenticated multi-user workspaces.

### Contributing
See [CONTRIBUTING.md](CONTRIBUTING.md). Security reports are covered by [SECURITY.md](SECURITY.md).

### License
MIT — see [LICENSE](LICENSE).

### Author
**Radwan Abdulhadi Ahmed** · **رضوان عبدالهادي أحمد** · GitHub: **@rad03i2**

---

## العربية

### نظرة عامة والهدف
هذا المستودع يحوّل تمرين Full Stack صغيرًا إلى لوحة مهام محلية مفيدة تعمل بـ PHP 8.2 وSQLite من دون إطار عمل. تُحفظ البيانات فعليًا في قاعدة محلية، وتُحمى عمليات الكتابة برمز CSRF، وتستخدم الاستعلامات المعلّمة مع ترميز المخرجات.

### المزايا
- إضافة المهام وعرضها وتصفيتها وتحديث حالتها وحذفها.
- حالات: للإنجاز، قيد التنفيذ، مكتملة؛ وأولويات منخفضة ومتوسطة وعالية.
- إنشاء مخطط SQLite تلقائيًا وحفظ دائم للبيانات.
- واجهة متجاوبة، حالات فارغة وأخطاء واضحة، تأكيد قبل الحذف، ووضع فاتح/داكن محفوظ محليًا.
- دعم العربية وUnicode.
- تحقق من القيم والأطوال وحماية CSRF وSQL المعلّم وترميز HTML.
- التطبيق نفسه بلا حزم تشغيل خارجية، مع اختبارات آلية صغيرة.

### المعاينة
بعد التشغيل افتح `http://localhost:8000`. ستجد إحصاءات الحالات ونموذج إضافة وفلاتر وبطاقات مهام متجاوبة. لم نثبت صورًا داخل المستودع حتى لا تصبح قديمة مقارنة بالواجهة الحالية.

### المتطلبات والتثبيت
تحتاج PHP 8.2 أو أحدث مع `pdo_sqlite` و`mbstring`.

```bash
git clone https://github.com/rad03i2/fullstack-mini-projects.git
cd fullstack-mini-projects
php -S localhost:8000 -t task-board
```

يُنشأ مجلد `data/` وقاعدة البيانات تلقائيًا عند أول تشغيل.

### الاستخدام والإعداد
أدخل عنوان المهمة ووصفها الاختياري وحالتها وأولويتها. استخدم الفلاتر، ومن البطاقة غيّر الحالة أو احذف المهمة. لا توجد متغيرات بيئة أو أسرار مطلوبة. عند النشر الفعلي اجعل `task-board/` جذر الويب واستخدم HTTPS وتعامل مع قاعدة البيانات كبيانات خاصة.

### بنية المشروع
`task-board/` للتطبيق، و`tests/run.php` للاختبارات، و`.github/workflows/ci.yml` للتحقق الآلي، بينما `data/` لبيانات التشغيل وهو مستبعد من Git.

### الاختبارات
شغّل `php tests/run.php`، ويمكن فحص الصياغة بالأمر الموضح في القسم الإنجليزي. ينفذ GitHub Actions الفحوص نفسها عند الدفع وطلبات الدمج.

### القيود
المشروع لوحة صغيرة لمستخدم واحد/استخدام محلي؛ لا يحتوي حسابات أو صلاحيات متعددة المستخدمين أو تعاونًا لحظيًا أو مرفقات أو إشعارات أو مزامنة سحابية. SQLite ليست موجهة للأحمال عالية التزامن.

### الأمان والخصوصية
تبقى المهام داخل SQLite محليًا، ولا توجد تحليلات أو تتبع أو API خارجي أو مفاتيح سرية. الحمايات الحالية تقلل مخاطر شائعة، لكن النشر على الإنترنت يحتاج HTTPS وإعداد خادم آمن ونسخًا احتياطية وتحكمًا بالوصول.

### تطوير اختياري
يمكن مستقبلًا إضافة تحرير كامل للمهام، تواريخ استحقاق، بحث، ومساحات متعددة المستخدمين بعد إضافة مصادقة مناسبة.

### المساهمة والترخيص
راجع [CONTRIBUTING.md](CONTRIBUTING.md) و[SECURITY.md](SECURITY.md). المشروع مرخص بترخيص MIT في [LICENSE](LICENSE).

### المؤلف
**Radwan Abdulhadi Ahmed** · **رضوان عبدالهادي أحمد** · GitHub: **@rad03i2**
