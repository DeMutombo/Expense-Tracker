module.exports = {
    purge: [
        "./resources/**/*.blade.php",
        "./resources/css/*.app.css",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    darkMode: false, // or 'media' or 'class'
    theme: {
        extend: {},
        container: {
            maxWidth: {
                DEFAULT: "100%",
                sm: "300px",
                md: "640px",
                lg: "640px",
                xl: "5rem",
            },
        },
    },

    variants: {
        extend: {},
    },
    plugins: [],
};
