
import jakarta.servlet.http.*;
import jakarta.servlet.*;
import java.io.*;
import java.sql.*;

public class InsertServlet extends HttpServlet {

    public void doPost(HttpServletRequest req, HttpServletResponse res) throws ServletException, IOException {
        res.setContentType("text/html");
        PrintWriter pw = res.getWriter();

        // Retrieve data from the form
        String bookId = req.getParameter("bookId");
        String bookTitle = req.getParameter("bookTitle");
        String bookAuthor = req.getParameter("bookAuthor");
        double bookPrice = Double.parseDouble(req.getParameter("bookPrice"));
        int quantity = Integer.parseInt(req.getParameter("quantity"));

        try {
            // Database connection
            Class.forName("com.mysql.jdbc.Driver");
            try (Connection con = DriverManager.getConnection("jdbc:mysql://localhost:3306/pragati", "root", "1234")) {
                String query = "INSERT INTO ebookshop (book_id, book_title, book_author, book_price, quantity) VALUES (?, ?, ?, ?, ?)";

                // Prepare and execute the query
                PreparedStatement pstmt = con.prepareStatement(query);
                pstmt.setString(1, bookId);
                pstmt.setString(2, bookTitle);
                pstmt.setString(3, bookAuthor);
                pstmt.setDouble(4, bookPrice);
                pstmt.setInt(5, quantity);
                int result = pstmt.executeUpdate();

                // Confirmation message
                if (result > 0) {
                    pw.println("<h1>Book added successfully!</h1>");
                } else {
                    pw.println("<h1>Error: Unable to add the book.</h1>");
                }
            }
        } catch (Exception e) {
            pw.println("<h1>Error: " + e.getMessage() + "</h1>");
        }

        pw.close();
    }
}
