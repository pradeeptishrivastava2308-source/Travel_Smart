<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Travel Agent</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="h.css">
</head>
<body>
    <header class="site-header">
        <nav class="navbar container">
            <a class="logo" href="./h.html">AI Travel Agent</a>
            <button class="menu-toggle" id="menuToggle" aria-label="Toggle menu">☰</button>
            <ul class="nav-links" id="navLinks">
                <li><a href="#h">Home</a></li>
                <li><a href="#features">Features</a></li>
                <li><a href="#planner">Quick Planner</a></li>
                <li><a href="./login.php">Login</a></li>
                <li><a href="./Registration_Page.php" class="nav-btn">Register</a></li>
                
            </ul>
        </nav>
    </header>

    <main>
        <section class="hero" id="home">
            <div class="container hero-grid">
                <div class="hero-content">
                    <p class="badge">AI-powered rail + hotel planning</p>
                    <h1>Plan smarter trips with one intelligent travel assistant</h1>
                    <p class="hero-subtext">
                        Describe your journey once. Instantly get train routes, hotel suggestions,
                        and a day-wise trip plan based on your budget and travel style.
                    </p>
                    <div class="hero-actions">
                        <a class="btn btn-primary" href="https://aistudio.google.com/apps/38759eb3-3d46-4dee-a53f-fd3759db184a?showPreview=true&showAssistant=true&fullscreenApplet=true" target="_blank" rel="noopener noreferrer">Try AI Agent</a>
                        <a class="btn btn-outline" href="#planner">Build a Quick Plan</a>
                    </div>
                    <div class="stats">
                        <article class="stat-card">
                            <h3>24/7</h3>
                            <p>AI planning support</p>
                        </article>
                        <article class="stat-card">
                            <h3>Rail + Stay</h3>
                            <p>One place to plan both</p>
                        </article>
                        <article class="stat-card">
                            <h3>Fast</h3>
                            <p>Trip summary in seconds</p>
                        </article>
                    </div>
                </div>

                <aside class="hero-panel">
                    <h2>Example prompt</h2>
                    <p class="prompt">"Plan a 4-day Jaipur trip from Delhi under ₹12,000 with train options and 3-star hotels."</p>
                    <div class="prompt-tags">
                        <span>Budget based</span>
                        <span>Train first</span>
                        <span>Hotel picks</span>
                        <span>Daily itinerary</span>
                    </div>
                    <a href="https://www.irctc.co.in/nget/train-search" target="_blank" rel="noopener noreferrer" class="quick-link">Open train booking ↗</a>
                    <a href="https://www.agoda.com" target="_blank" rel="noopener noreferrer" class="quick-link">Open hotel search ↗</a>
                </aside>
            </div>
        </section>

        <section class="features section" id="features">
            <div class="container">
                <div class="section-heading">
                    <p class="heading-tag">What you can do</p>
                    <h2>Everything needed for your next trip</h2>
                </div>
                <div class="feature-grid">
                    <article class="feature-card">
                        <div class="feature-icon">🤖</div>
                        <h3>AI Trip Planner</h3>
                        <p>Generate personalized plans using your dates, budget, and preferences.</p>
                        <a href="https://aistudio.google.com/apps/38759eb3-3d46-4dee-a53f-fd3759db184a?showPreview=true&showAssistant=true&fullscreenApplet=true" target="_blank" rel="noopener noreferrer">Launch AI assistant</a>
                    </article>
                    <article class="feature-card">
                        <div class="feature-icon">🚆</div>
                        <h3>Train Booking Access</h3>
                        <p>Jump to reservation flow quickly after reviewing route recommendations.</p>
                        <a href="https://www.irctc.co.in/nget/train-search" target="_blank" rel="noopener noreferrer">Check trains</a>
                    </article>
                    <article class="feature-card">
                        <div class="feature-icon">🏨</div>
                        <h3>Hotel Discovery</h3>
                        <p>Find stay options by location, budget and comfort level for your itinerary.</p>
                        <a href="https://www.agoda.com" target="_blank" rel="noopener noreferrer">Find hotels</a>
                    </article>
                </div>
            </div>
        </section>

        <section class="planner section" id="planner">
            <div class="container planner-wrap">
                <div class="planner-info">
                    <p class="heading-tag">Quick planner demo</p>
                    <h2>Get a travel brief in one click</h2>
                    <p>Fill your trip details to generate a starter plan you can copy into your AI assistant.</p>
                </div>
                <form class="planner-form" id="tripForm">
                    <div class="form-grid">
                        <label>
                            From
                            <input type="text" id="fromCity" placeholder="Delhi" required>
                        </label>
                        <label>
                            To
                            <input type="text" id="toCity" placeholder="Jaipur" required>
                        </label>
                        <label>
                            Travel Date
                            <input type="date" id="travelDate" required>
                        </label>
                        <label>
                            Budget (₹)
                            <input type="number" id="budget" placeholder="12000" min="1000" required>
                        </label>
                        <label>
                            Trip Days
                            <input type="number" id="tripDays" placeholder="4" min="1" max="20" required>
                        </label>
                        <label>
                            Travelers
                            <input type="number" id="travelers" placeholder="2" min="1" max="10" required>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary full">Generate quick plan</button>
                </form>
                <div class="plan-result hidden" id="planResult" aria-live="polite"></div>
            </div>
        </section>

        <section class="destinations section">
            <div class="container">
                <div class="section-heading row">
                    <div>
                        <p class="heading-tag">Explore ideas</p>
                        <h2>Popular destination styles</h2>
                    </div>
                    <div class="filter-buttons" id="filterButtons">
                        <button data-filter="all" class="active">All</button>
                        <button data-filter="city">City</button>
                        <button data-filter="mountain">Mountain</button>
                        <button data-filter="beach">Beach</button>
                    </div>
                </div>
                <div class="destination-grid">
                    <article class="destination-card" data-type="city">
                        <h3>Jaipur</h3>
                        <p>Forts, heritage stays, and vibrant local markets.</p>
                    </article>
                    <article class="destination-card" data-type="mountain">
                        <h3>Shimla</h3>
                        <p>Cool weather, toy train routes, and hill-view hotels.</p>
                    </article>
                    <article class="destination-card" data-type="beach">
                        <h3>Goa</h3>
                        <p>Beach relaxation, water activities, and coastal stays.</p>
                    </article>
                    <article class="destination-card" data-type="mountain">
                        <h3>Manali</h3>
                        <p>Adventure spots, mountain cafes, and valley views.</p>
                    </article>
                    <article class="destination-card" data-type="city">
                        <h3>Delhi</h3>
                        <p>Food trails, monuments, and easy railway connectivity.</p>
                    </article>
                    <article class="destination-card" data-type="beach">
                        <h3>Pondicherry</h3>
                        <p>French quarters, clean beaches, and boutique hotels.</p>
                    </article>
                </div>
            </div>
        </section>
    </main>

    <section class="cta">
        <div class="container cta-box">
            <h2>Ready to build your next journey?</h2>
            <p>Create an account and start planning with your AI Travel Agent today.</p>
            <a class="btn btn-primary" href="./Registration_Page.php">Create free account</a>
        </div>
    </section>

    <footer class="site-footer">
        <p>© <span id="year"></span> AI Travel Agent. Built for smarter travel planning.</p>
    </footer>

    <script src="h.js"></script>
</body>
</html>

